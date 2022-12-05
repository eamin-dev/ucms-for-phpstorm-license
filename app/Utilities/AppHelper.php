<?php

namespace App\Utilities;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;

class AppHelper
{

    /**
     * @param $exception
     * @param $route
     * @return RedirectResponse
     */
    public static function errorRedirect($message, $exception = null, $route = null)
    {
        $message = $message != null
            ? $message
            :'Something went wrong. Please try again later';
        if (config('app.env') == 'production') {
            if (is_null($route)) {
                Toastr::error($message, '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            } else{
                Toastr::error($message, '', ["positionClass" => "toast-top-right"]);
                return redirect()->route($route);
            }
        } else {
            $message = $exception != null
                ? $exception->getMessage().' on line '.$exception->getLine().' in '.$exception->getFile()
                : $message;
            if (is_null($route)) {
                Toastr::error($message, '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            } else{
                Toastr::error($message, '', ["positionClass" => "toast-top-right"]);
                return redirect()->route($route);
            }
        }
    }

    /**
     * @param $exception
     * @param $message
     * @return JsonResponse
     */
    public static function errorResponse($message = null, $exception = null)
    {
        $message = $message != null
            ? $message
            :'Something went wrong. Please try again later';
        if (config('app.env') == 'production') {
            return response()->json([
                'status' => 'failed',
                'message' => $message,
                'data' => null
            ], 500);
        } else {
            $message = $exception != null
                ? $exception->getMessage().' on line '.$exception->getLine().' in '.$exception->getFile()
                : $message;
            return response()->json([
                'status' => 'failed',
                'message' => $message,
                'data' => null,
            ], 500);
        }
    }


    /**
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public static function successResponse($message, $data = null)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    /**
     * @param $message
     * @param $route
     * @return RedirectResponse
     */
    public static function successRedirect($message, $route = null)
    {
        if (is_null($route)) {
            Toastr::success($message, '', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        } else{
            Toastr::success($message, '', ["positionClass" => "toast-top-right"]);
            return redirect()->route($route);
        }
    }


    /**
     * @param $string
     * @return string
     */
    public static function encrypt($string)
    {
        return Crypt::encryptString($string);
    }

    /**
     * @param $string
     * @return string
     */
    public static function decrypt($string)
    {
        return Crypt::decryptString($string);
    }


}
