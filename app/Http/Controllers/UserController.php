<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

    public function index()
    {
       $data=[
        'users'=>User::all()
       ];
       return view('backend.users.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success','User registered successfully');

    }

    public function assign(Request $request,string $id)
    {
        $contribution=Contribution::find($id);
        foreach($request->users as $user_id){
            $contribution->users()->syncWithoutDetaching([$user_id]);
            $contribution->payments()->syncWithoutDetaching([$user_id]);
           
        }
        return redirect()->back()->with('success','users added successfully');
    }
}
