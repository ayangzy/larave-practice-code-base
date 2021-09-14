<?php
namespace App\Http\Actions\Auth;

use App\Http\Resources\UserLoginResource;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    use ApiResponses;

    public function execute(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return $this->notFoundResponse('User with this email'.' ' . $request->email. ' ' .'does not exist');
        }

        if(!Hash::check($request->password, $user->password)){
            return $this->unauthorisedResponse('The provided credentials are incorrect');
        }

        if($user->email_verified_at == null){
            return $this->badRequestResponse('Account not verified');
        }

        $token = $user->createToken('thisisapracticeexercise')->plainTextToken;
        $user->token = $token;

        return $this->successResponse('User successfully logged in', new UserLoginResource($user));
    }
}