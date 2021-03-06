<?php

namespace App\Repositories;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UserRepository implements UserRepositoryInterface {

    protected $user;
    
    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function findUserById($id)
    {
        return $this->user->findOrFail($id);
    }

    public function updatePersonalInformation($user, $attribute)
    {
        $result = $user->update([
            'name' => $attribute['full_name'],
            'username' => $attribute['username'],
            'profile_description' => $attribute['profile_description'],
            'instagram' => $attribute['instagram'],
            'twitter' => $attribute['twitter'],
            'facebook' => $attribute['facebook'],
        ]);

        return $result;
    }

    public function updatePassword($user, $attribute) 
    {
        $currentPassword = $user->password;
        $oldPassword = $attribute['current_password'];

        if ( Hash::check($oldPassword, $currentPassword) ) {
            $result = $user->update([
                'password' => bcrypt(request('password')),
            ]);

            return $result;
        } else {
            throw new Exception('Wrong Current Password.');
        }
    }

    public function updateEmail($user, $attribute) 
    {
        $result = $user->update([
            'email' => $attribute['email'],
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();

        return $result;
    }

    public function updatePhotoProfile($user, $attribute) 
    {
        $photoProfileSrc = $attribute['photo_profile'];

        $photoExtensions = $photoProfileSrc->getClientOriginalExtension();
        $photoProfileName = time() . '-' . uniqid() . '.' .$photoExtensions;

        $photo = Image::make($photoProfileSrc)->resize(300, 300);
        $photo->stream($photoExtensions, 90);
        Storage::disk('public')->put('profile/' . $photoProfileName, $photo, 'public');

        $photoProfile = 'profile/' . $photoProfileName;

        $result = $user->update([
            'profile_picture' => $photoProfile,
        ]);

        return $result;
    }

}