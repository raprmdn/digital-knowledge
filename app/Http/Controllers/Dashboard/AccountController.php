<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AccountController extends Controller
{
    
    public function personalInformation() 
    {
        $id = auth()->user()->id;
        $articles = $this->findArticleByUser($id);
        return view('backend.profile-setting.personal-information', compact('articles'));
    }

    public function securitySettings() 
    {
        $id = auth()->user()->id;
        $articles = $this->findArticleByUser($id);
        return view('backend.profile-setting.user-setting', compact('articles'));
    }

    public function editPersonalInformation() 
    {
        $id = auth()->user()->id;
        $articles = $this->findArticleByUser($id);
        return view('backend.profile-setting.edit-information', compact('articles'));
    }

    public function updatePersonalInformation() 
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        request()->validate([
            'full_name' => ['required', 'min:3'],
            'username' => ['required', 'string', 'max:25', 'alpha_num', Rule::unique('users', 'username')->ignore($user)],
        ]);
        
        $user->update([
            'name' => request('full_name'),
            'username' => request('username'),
            'profile_description' => request('profile_description'),
            'instagram' => request('instagram'),
            'twitter' => request('twitter'),
            'facebook' => request('facebook'),
        ]);

        return redirect()->route('profile.personal.information')->with('success', 'Profile Information has been updated.');

    }

    public function editPassword() 
    {
        $id = auth()->user()->id;
        $articles = $this->findArticleByUser($id);
        return view('backend.profile-setting.password.edit', compact('articles'));
    }

    public function updatePassword() 
    {
        request()->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPassword = auth()->user()->password;
        $oldPassword = request('current_password');

        if ( Hash::check($oldPassword, $currentPassword) ) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return redirect()->back()->with('success', 'Password has been changed.');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Wrong current password.']);
        }

    }

    public function editEmail() 
    {
        $id = auth()->user()->id;
        $articles = $this->findArticleByUser($id);
        return view('backend.profile-setting.email.edit', compact('articles'));
    }

    public function updateEmail() 
    {
        request()->validate([
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('users', 'email')],
        ]);

        $user = auth()->user();
        
        $user->update([
            'email' => request('email'),
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect('/')->with('success', 'Email has been changed. Please Verify your email address.');
    }

    public function updatePhotoProfile() 
    {
        request()->validate([
            'photo_profile' => ['required', 'mimes:jpg,jpeg,png', 'max:5000'],
        ]);

        $photoProfileSrc = request('photo_profile');

        $photoExtensions = $photoProfileSrc->getClientOriginalExtension();
        $photoProfileName = time() . '-' . uniqid() . '.' .$photoExtensions;

        $photo = Image::make($photoProfileSrc)->resize(300, 300);
        $photo->stream($photoExtensions, 90);
        Storage::disk('public')->put('profile/' . $photoProfileName, $photo, 'public');

        $photoProfile = 'profile/' . $photoProfileName;

        auth()->user()->update([
            'profile_picture' => $photoProfile,
        ]);

        return redirect()->back()->with('success', 'Photo Profile has been uploaded.');
    }

    public function findArticleByUser($id) 
    {
        $articles = Article::where('article_user_id', $id);
        return $articles;
    }

}
