<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function personalInformation() 
    {
        return view('backend.profile-setting.personal-information');
    }

    public function securitySettings() 
    {
        return view('backend.profile-setting.user-setting');
    }

}
