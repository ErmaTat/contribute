<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //

    public function index()
    {
        $data = [
            'users' => User::all()
        ];
        return view('backend.users.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User registered successfully');
    }

    public function assign(Request $request, string $id)
    {
        $validated = $request->validate([
            'users' => 'required|array',
            'users.*' => 'integer|exists:users,id',
        ]);
        $contribution = Contribution::find($id);
        $schedules = Schedule::where('contribution_id', $contribution->id)->get();

        foreach ($request->users as $user_id) {
            $user = User::find($user_id);
            $contribution->users()->syncWithoutDetaching([$user_id]);
            if($contribution->contribution_type=='recurring'){
                foreach ($schedules as $schedule) {
                    if (!$user->schedules()->where('schedule_id', $schedule->id)->exists()) {
                        $user->schedules()->attach($schedule->id);
                    }
                }
            }else{
                $contribution->payments()->syncWithoutDetaching([$user_id]);
            }
        }

        return redirect()->back()->with('success', 'Contributors added successfully');
    }

    public function role(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:roles,name',
        ]);
        $role = Role::create(['name' => $request->input('role')]);
        return redirect()->back()->with('success', 'User Role Created');
    }

    public function show(Request $request, string $id)
    {
        $data = [
            'user' => User::find($id),
            'roles' => Role::all()
        ];
        return view('backend.users.show', $data);
    }

    public function assign_role(Request $request)
    {
        $user = User::find($request->user_id);
        
        $user->roles()->detach();
        $user->assignRole($request->input('role_id'));
        return redirect()->back()->with('success', 'User role assigned successfully');
    }


}
