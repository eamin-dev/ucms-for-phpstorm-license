<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Flow;
use App\Models\Region;

class NewRegionController extends Controller
{
    public function viewRegion()
    {
        $regions = Region::all();
        $data = [];
        foreach ($regions as $region){
            $data[] = $this->getReportByRegion($region);
        }
//        return $data;
        return view('file-report.regions', compact('data'));
    }

    public function getDetails(Region $region)
    {
        $data = $this->getReportByRegion($region);
        return view('file-report.countrydetails', $data);
    }

    public function getReportByRegion($region){
        $countries = Country::where('region_id', $region->id)
            ->whereHas('flows')
            ->withCount('flows')
            ->get();

        $total_themefic_area_count = Flow::where('region_id', $region->id)->groupBy('themefic_area_id')->count();

        $data = [
            'region_id' => $region->id,
            'region_name' => $region->name,
            'region_image' => $region->image,
            'countries' => $countries,
            'total_country' => $countries->count(),
            'total_themefic_area_count' => $total_themefic_area_count,
            'total_flow_count' => $countries->sum('flows_count'),
        ];

        return $data;
    }
}
