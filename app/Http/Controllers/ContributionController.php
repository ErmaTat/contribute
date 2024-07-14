<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContributionController extends Controller
{
    //
    private function generateRandomCode($length = 12)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomPassword = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomPassword;
    }

    public function index()
    {
        $data = [
            'contributions' => Contribution::all()
        ];
        return view('backend.contribution.index', $data);
    }

    public function create()
    {
        return view('backend.contribution.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        $invite = $this->generateRandomCode();
        $request->merge(['contribution_address' => $invite]);
        Contribution::create($request->all());
        return redirect(route('contribution.index'))->with('success', 'Project/Contribution created successfully');
    }

    public function show(string $id)
    {
        $dates = [];
        $startOfWeek = Carbon::now()->startOfWeek(); // Assuming the week starts on Monday

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $day = $date->day;
            $month = $date->format('F');

            if ($day % 10 == 1 && $day != 11) {
                $suffix = 'st';
            } elseif ($day % 10 == 2 && $day != 12) {
                $suffix = 'nd';
            } elseif ($day % 10 == 3 && $day != 13) {
                $suffix = 'rd';
            } else {
                $suffix = 'th';
            }

            $dates[] = "{$day}<sup>{$suffix}</sup> {$month}";
        }
        $data = [
            'contribution' => Contribution::find($id),
            'dates'=>$dates,
            'users'=>User::all()
        ];
        return view('backend.contribution.show', $data);
    }

    public function update(Request $request,string $id)
    {
        $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        $cont=Contribution::find($id);
        $cont->update($request->all());
        return redirect()->back()->with('success', 'Project/Contribution details updated successfully');
    }

    
}
