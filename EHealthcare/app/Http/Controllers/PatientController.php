<?php

namespace App\Http\Controllers;

use App\patient;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $user=New User;
        $user->name=$req->fullname;
        $user->username=$req->username;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->type='patient';
        $user->contactno=$req->contactno;
        $image=$req->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/'.$img);
        Image::make($image)->save($location);
        $user->photo=$img;
        $user->save();

        $uid = $user->id;

        $patient=new patient;
        $patient->dob = $req->dob;
        $patient->address = $req->address;
        $patient->bmi = $req->bmi;
        $patient->weight = $req->weight;
        $patient->bloodpressure = $req->bp;
        $patient->bloodgroup = $req->bg;
        $patient->cal = $req->cal;
        $patient->user_id = $uid;
        $patient->save();

        session()->flash('success',' New Patient Added');
        return redirect()->route('admin.patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        //
    }
}
