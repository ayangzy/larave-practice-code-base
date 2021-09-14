<?php

namespace App\Traits;

trait ApiResponses
{
    public function createdResponse($message, $data = null, $status_code = 201)
    {
        return response([
            'status_code' => $status_code,
            'status_text'=> 'created',
            'message' => $message,
            'data' => $data
        ]);
    }


    public function notFoundResponse($message, $status_code=404)
    {
        return response([
            'status_code' => $status_code,
            'status_text'=> 'not_found',
            'message' => $message,
        ]);
    }


    public function successResponse($message, $data = null, $status_code=200)
    {
        return response([
            'status_code' => $status_code,
            'status_text'=> 'success',
            'message' => $message,
            'data' => $data 
        ]);
    }


    public function badRequestResponse($message, $status_code=400)
    {
        return response([
            'status_code' => $status_code,
            'status_text'=> 'bad_request',
            'message' => $message,
            
        ]);
    }

    public function unauthorisedResponse($message, $status_code=401)
    {
        return response([
            'status_code' => $status_code,
            'status_text'=> 'bad_request',
            'message' => $message,  
        ]);
    }
}