<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Actions\Auth\StoreUserAction;

class RegistrationController extends Controller
{
    public function register(RegisterRequest $request, StoreUserAction $storeUserAction)
    {
       return $storeUserAction->execute($request);
        
    }
}
