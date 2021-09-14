<?php

namespace App\Http\Controllers\User;

use App\Http\Actions\User\UserProfileAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(UserUpdateProfileRequest $request, UserProfileAction $userProfileAction)
    {
        return $userProfileAction->execute($request);
    }
}
