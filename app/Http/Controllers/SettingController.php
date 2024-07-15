<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function index()
    {
        $data=[
            'roles'=>Role::all()
        ];
        return view('backend.settings.index',$data);
    }
}
