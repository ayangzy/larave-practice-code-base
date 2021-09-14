<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    use ApiResponses;

    public function __invoke(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->successResponse('User successfully logout');
    }
   
}
