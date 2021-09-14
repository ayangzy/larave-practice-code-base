<?php

namespace App\Http\Actions\User;

use App\Models\UserDetails;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileAction
{
    use ApiResponses;

    public function execute(Request $request)
    {
        $user = auth()->user();

        if(!is_null($request->image)){
            $fileName = time() + 1 . '.' . $request->image->extension();
            // delete the user's old profile photo
            $this->deleteOldPicture($user);
            // save the photo to the local storage
            $request->image->storeAs('images', $fileName, 'public');
        }

        $user->userDetails->update([
            'image_url' => $fileName ?? $user->userDetails->image_url,
            'first_name' => $request->first_name ?? $user->userDetails->first_name,
            'last_name' => $request->last_name ?? $user->userDetails->last_name,
            'middle_name' => $request->middle_name ?? $user->userDetails->middle_name,
            'address' => $request->address ?? $user->userDetails->address,
        ]);

        return $this->successResponse('User profile updated successfully.',$user->userDetails);
       
    }


    private function deleteOldPicture($user)
    {
        if ($user->userDetails->image_url) {
            Storage::disk('public')->delete('images/' . $user->userDetails->image_url);
        }
    }

    private function updateDetails($user, $fileName, $request)
    {
        $user->userDetails->update([
            'image_url' => $fileName ?? $user->userDetails->image_url,
            'first_name' => $request->first_name ?? $user->userDetails->first_name,
            'last_name' => $request->last_name ?? $user->userDetails->last_name,
            'middle_name' => $request->middle_name ?? $user->userDetails->middle_name,
            'address' => $request->address
        ]);
    }
}