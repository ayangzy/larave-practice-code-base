<?php

namespace App\Http\Controllers\Auth;

use App\Http\Actions\Auth\VerificationAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, VerificationAction $verificationAction)
    {
        return $verificationAction->execute($request);
    }
}
