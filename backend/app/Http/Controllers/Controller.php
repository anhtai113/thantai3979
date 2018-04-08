<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataSuccess($message, $data=[], $code=200){
    	return response()->json([
    		'result'	=>	true,
    		'message'	=>  $message,
    		'data'		=>	$data,
    		'code'		=>  200

    	], 200);
    }

    public function dataErrors($message, $data=[], $code=201){
    	return response()->json([
    		'result'	=>	false,
    		'message'	=>  $message,
    		'data'		=>	$data,
    		'code'		=>  201

    	], 200);
    }
}
