<?php

use App\Models\GeneralSetting;

if (!function_exists('gs')) {
    function gs()
    {
        return GeneralSetting::first();
    }
}



if (!function_exists('successResponseData')) {
    function successResponseData($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => true,
            'code'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}

if (!function_exists('successResponseMessage')) {
    function successResponseMessage($data = [],$message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => true,
            'code'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}

if (!function_exists('errorResponseMessage')) {
    function errorResponseMessage($message = '',$errors = [] , $status = 422 , $data = [])
    {
        return response()->json([
            'status' => false,
            'code'   => $status,
            'message'   => (is_object($message) && count($message) )? $message->first() :   $message ,
            'errors'   => $errors,
            'data'       => $data,
        ], $status);
    }
}
