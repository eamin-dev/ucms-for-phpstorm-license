<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function reportRapidPro()
    {
//       return $rapidpro = Flow::with('creator.region','creator.country','themeficArea')->get();
        if (\request()->ajax()) {
            $rapidpro = Flow::with('creator.region', 'creator.country', 'themeficArea');
            return DataTables::of($rapidpro)
                ->addIndexColumn()
                ->addColumn('themefic_area', function ($data) {
                    return $data->themeficArea->code;
//                    return $data->themeficArea->code ."<br>". $data->themeficArea->name;
                })
                ->addColumn('date_time', function ($data) {
                    return Carbon::parse($data->created_at)->format('M d, Y h:i');
                })
                ->addColumn('action', function ($data) {
                    return ':';
                })
                ->rawColumns(['themefic_area', 'action'])
                ->toJson();
        }
        return view('file-report.rapidpro');
    }
}
