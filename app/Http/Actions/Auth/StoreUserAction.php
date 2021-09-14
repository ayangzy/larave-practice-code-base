<?php

namespace App\Http\Actions\Auth;

use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\newUserResource;
use App\Models\UserDetails;
use App\Models\VerificationToken;
use Exception;

class StoreUserAction 
{
    use ApiResponses;

    public function execute(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);
    
            $this->saveUserDetails($user, $request);

            $this->generateOTP($user);

            $token = $user->verificationToken->token;
           
            $newuserResouce = new newUserResource($user);
           
            Mail::to($user->email)->send(new UserRegistrationMail($user, $token));

            DB::commit();
           return $this->createdResponse('Registration created successfully, check your email to verify you account', $newuserResouce);
        } catch (Exception $ex) {
            DB::rollBack();
            throw new Exception('An error occured processing your request, please try again');
        }
        
    }

    protected function saveUserDetails($user, Request $request)
    {
        $userDetails = UserDetails::create([
            'user_id'=> $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
        ]);

        return $userDetails;
    }

    protected function generateOTP($user)
    {
        $randonCode = rand(10000, 99999);;
        $Otp = VerificationToken::create([
            'user_id' => $user->id,
            'token' => $randonCode,
        ]);

        return $Otp;
    }
}