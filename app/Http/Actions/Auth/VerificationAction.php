<?php

namespace App\Http\Actions\Auth;

use App\Models\User;
use App\Models\VerificationToken;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class VerificationAction
{
    use ApiResponses;
    public function execute(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = VerificationToken::where('token', $request->token)->first();
       
        if(!$user){
            return $this->notFoundResponse('User Email does not exists');
        }
        if(!$token){
            return $this->notFoundResponse('Invalid Token');
        }

        if(!$token->isValid()){
            return $this->badRequestResponse('Token is expired');
        }
        
        if($token->user->email !== $request->token){
            return $this->badRequestResponse('Invalid Token');
        }
        
        $user->email_verified_at = now();
        $user->save();
        $token->delete();

        return $this->successResponse('Token successfully verified');
   
    }
}