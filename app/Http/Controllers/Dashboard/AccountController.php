<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class AccountController extends Controller
{

    protected $userRepository, $articleRepository;

    public function __construct(UserRepositoryInterface $userRepository, ArticleRepositoryInterface $articleRepository) 
    {
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
    }
    
    public function personalInformation() 
    {
        $id = auth()->user()->id;
        $articles = $this->articleRepository->getTotalArticleUser($id);
        return view('backend.profile-setting.personal-information', compact('articles'));
    }

    public function securitySettings() 
    {
        $id = auth()->user()->id;
        $articles = $this->articleRepository->getTotalArticleUser($id);
        return view('backend.profile-setting.user-setting', compact('articles'));
    }

    public function editPersonalInformation() 
    {
        $id = auth()->user()->id;
        $articles = $this->articleRepository->getTotalArticleUser($id);
        return view('backend.profile-setting.edit-information', compact('articles'));
    }

    public function updatePersonalInformation() 
    {
        $id = auth()->user()->id;
        $user = $this->userRepository->findUserById($id);

        request()->validate([
            'full_name' => ['required', 'min:3'],
            'username' => ['required', 'string', 'max:25', 'alpha_num', Rule::unique('users', 'username')->ignore($user)],
        ]);
        
        $attribute = request()->all();
        
        $this->userRepository->updatePersonalInformation($user, $attribute);

        return redirect()->route('profile.personal.information')->with('success', 'Profile Information has been updated.');

    }

    public function editPassword() 
    {
        $id = auth()->user()->id;
        $articles = $this->articleRepository->getTotalArticleUser($id);
        return view('backend.profile-setting.password.edit', compact('articles'));
    }

    public function updatePassword() 
    {
        request()->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $user = auth()->user();
            $attribute = request()->all();
            $this->userRepository->updatePassword($user, $attribute);
            return redirect()->back()->with('success', 'Password has been changed.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['current_password' => 'Wrong current password.']);
        }

    }

    public function editEmail() 
    {
        $id = auth()->user()->id;
        $articles = $this->articleRepository->getTotalArticleUser($id);
        return view('backend.profile-setting.email.edit', compact('articles'));
    }

    public function updateEmail() 
    {
        request()->validate([
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('users', 'email')],
        ]);

        $user = auth()->user();
        $attribute = request()->all();
        $this->userRepository->updateEmail($user, $attribute);

        return redirect('/')->with('success', 'Email has been changed. Please Verify your email address.');
    }

    public function updatePhotoProfile() 
    {
        request()->validate([
            'photo_profile' => ['required', 'mimes:jpg,jpeg,png', 'max:5000'],
        ]);

        $user = auth()->user();
        $attribute = request()->all();

        $this->userRepository->updatePhotoProfile($user, $attribute);

        return redirect()->back()->with('success', 'Photo Profile has been uploaded.');
    }
}
