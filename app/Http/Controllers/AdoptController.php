<?php

namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdoptController extends Controller
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
            $adopts = Adopt::all();
            return Inertia::render('Admin/Adopt', [
                'adopts' => $adopts->map(function ($adopt) {
                    return [
                        'id' => $adopt->id,
                        'cat_id' => $adopt->cat_id,
                        'user_id' => $adopt->user_id,
                        'first_name' => $adopt->first_name,
                        'last_name' => $adopt->last_name,
                        'address' => $adopt->address,
                        'phone_number' => $adopt->phone_number,
                        'age' => $adopt->age,
                        'email' => $adopt->email,
                        'citizenship' => $adopt->citizenship,
                        'occupation' => $adopt->occupation,
                        'radioQuestion' => $adopt->radioQuestion,
                        'is_accepted' => $adopt->is_accepted,
                    ];
                })
            ]);
        } else {
            
            $cats = Cat::all();
            return Inertia::render('Client/Adopt', [
                'cats' => $cats->map(function ($cat) {
                    return [
                        'id' => $cat->id,
                        'name' => $cat->name,
                        'gender' => $cat->gender,
                        'age_category' => $cat->age_category,
                        'tags' => $cat->tags,
                        'color' => $cat->color,
                        'image_path' => asset('storage/' . $cat->image_path),
                    ];
                })
            ]);
        }

        // return Inertia::render('Adopt/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $adopts = DB::table('adopts')
            ->join('cats', 'cats.id', '=', 'adopts.cat_id')
            ->leftJoin('schedules', 'schedules.adopt_id', '=', 'adopts.id')
            ->select('adopts.*', 'cats.id as cat_id', 'cats.name as cat_name', 'cats.image_path as cat_image', 'schedules.appointment')
            ->where('adopts.user_id', '=', Auth::id())
            ->get();
        return Inertia::render('Client/AdoptRequest', [
            'adopts' => $adopts->map(function ($adopt) {
                return [
                    'id' => $adopt->id,
                    'first_name' => $adopt->first_name,
                    'last_name' => $adopt->last_name,
                    'phone_number' => $adopt->phone_number,
                    'email' => $adopt->email,
                    'cat_id' => $adopt->cat_id,
                    'cat_name' => $adopt->cat_name,
                    'cat_image' => asset('storage/' . $adopt->cat_image),
                    'address' => $adopt->address,
                    'is_accepted' => $adopt->is_accepted,
                    'appointment' => $adopt->appointment,
                ];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'catID' => 'unique:adopts,cat_id,NULL,id,user_id,' . Auth::id(),
        ]);

        $user = DB::table('adopts')->where('cat_id', $request->catID)->first();
        if (empty($user)) {
            $adopt = new Adopt();
            $adopt->cat_id = $request->cat_id;
            $adopt->user_id = $request->user_id;
            $adopt->first_name = $request->first_name;
            $adopt->last_name = $request->last_name;
            $adopt->address = $request->address;
            $adopt->phone_number = $request->phone_number;
            $adopt->age = $request->age;
            $adopt->email = $request->email;
            $adopt->citizenship = $request->citizenship;
            $adopt->occupation = $request->occupation;
            $adopt->radioQuestion = $request->jsonRadioQuestion;
            $adopt->is_accepted = false;
            $adopt->save();
        } else {
        }
        return  redirect()->route('adopts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function show(Adopt $adopt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function edit(Adopt $adopt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopt $adopt)
    {
        //
        $adopt->update([
            'is_accepted' => true,
        ]);
        return  redirect()->route('adopts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adopt  $adopt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adopt $adopt)
    {
        //
        $adopt->delete();
        $user = DB::table('users')->where('id', Auth::id())->first();
        if ($user->role === 'admin') {
            return  redirect()->route('adopts.index');
        } else {
            return  redirect()->route('adopts.create');
        }
    }
}
