<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->where('id', Auth::id())->first();
        if ($user->role === 'admin') {
            $volunteers = Volunteer::all();
            return Inertia::render('Admin/Volunteer', [
                'volunteers' => $volunteers->map(function ($volunteer) {
                    return [
                        'id' => $volunteer->id,
                        'user_id' => $volunteer->user_id,
                        'first_name' => $volunteer->first_name,
                        'last_name' => $volunteer->last_name,
                        'address' => $volunteer->address,
                        'phone_number' => $volunteer->phone_number,
                        'occupation' => $volunteer->occupation,
                        'email' => $volunteer->email,
                        'age' => $volunteer->age,
                        'interested_in' => $volunteer->interested_in,
                        'experience' => $volunteer->experience,
                    ];
                })
            ]);
        } else {
            $volunteers = Volunteer::query()->get(['*'])->where('user_id', '=', Auth::id());
            return Inertia::render('Client/Volunteer', [
                'volunteers' => $volunteers->map(function ($volunteer) {
                    return [
                        'id' => $volunteer->id,
                        'user_id' => $volunteer->user_id,
                        'first_name' => $volunteer->first_name,
                        'last_name' => $volunteer->last_name,
                        'address' => $volunteer->address,
                        'phone_number' => $volunteer->phone_number,
                        'occupation' => $volunteer->occupation,
                        'email' => $volunteer->email,
                        'age' => $volunteer->age,
                        'interested_in' => $volunteer->interested_in,
                        'experience' => $volunteer->experience,
                    ];
                })
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function client()
    {
        return Inertia::render('Volunteer/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**x
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'json_interested_in' => 'required',
        ]);
        $volunteer = new Volunteer();
        $volunteer->user_id = Auth::id();
        $volunteer->first_name = $request->first_name;
        $volunteer->last_name = $request->last_name;
        $volunteer->address = $request->address;
        $volunteer->phone_number = $request->phone_number;
        $volunteer->occupation = $request->occupation;
        $volunteer->email = $request->email;
        $volunteer->age = $request->age;
        $volunteer->interested_in = $request->json_interested_in;
        $volunteer->experience = $request->experience;
        $volunteer->save();

        // return  redirect()->route('volunteers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
        $request->validate([
            'json_interested_in' => 'required',
        ]);

        $volunteer->update([
            'interested_in' => $request->json_interested_in,
            'experience' => $request->experience,
        ]);

        // dd($volunteer);

        return  redirect()->route('volunteers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
        $volunteer->delete();

        return  redirect()->route('volunteers.index');
    }
}
