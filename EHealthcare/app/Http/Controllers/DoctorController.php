<?php

namespace App\Http\Controllers;

use App\doctor;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Image;
use File;
use Validator;

class DoctorController extends Controller
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

        $validation = Validator::make($req->all(),[
            'name'=>'required | min:5',
            'username'=>'required | min:6',
            'email'=> 'required |unique:users,email',
            'password'=>'required|min:6',
            'contactno'=>'required|numeric|min:6',
            'dob'=>'required',
            'fee'=>'required',
            'qualification'=>'required',
        ]);
    
        if($validation->fails()){
            return redirect()
            ->route('admin.createdoctors')->with('errors',$validation->errors());
        }


        $user=New User;
        $user->name=$req->fullname;
        $user->username=$req->username;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->type='doctor';
        $user->contactno=$req->contactno;
        $image=$req->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/'.$img);
        Image::make($image)->save($location);
        $user->photo=$img;
        $user->save();



        $uid = $user->id;

        $doctor = new doctor;
        $doctor->dob = $req->dob;
        $doctor->qualification = $req->qualification;
        $doctor->about = $req->about;
        $doctor->fee = $req->fee;
        $doctor->user_id = $uid;
        $doctor->save();

        session()->flash('success',' New Doctor Added');
        return redirect()->route('admin.doctors');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
        //
    }
}
