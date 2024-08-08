<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    //
    public function index()
    {
        $data=[
            'roles'=>Role::all(),
            'user'=>Auth::user()
        ];
        return view('backend.settings.index',$data);
    }

    public function security(){
        return view('backend.settings.security');
    }

    public function users(){
        $data=[
            'roles'=>Role::all(),
            'users'=>User::all()
        ];
        return view('backend.settings.users',$data);
    }

    public function notifications(){
        return view('backend.settings.notifications');
    }

    public function app(){
        return view('backend.settings.app');
    }
}
