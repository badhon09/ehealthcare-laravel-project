<?php

namespace App\Http\Controllers;

use App\patient;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
use Validator;
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

        $validation = Validator::make($req->all(),[
            'fullname'=>'required | min:5',
            'username'=>'required | min:6',
            'email'=> 'required |unique:users,email',
            'password'=>'required|min:6',
            'contactno'=>'required|numeric|min:6',
            'dob'=>'required',
            'address'=>'required',
            'bmi'=>'required',
            'weight'=>'required',
            'bp'=>'required',
            'bg'=>'required',
            'cal'=>'required',
        ]);
    
        if($validation->fails()){
            return redirect()
            ->route('admin.createpatients')->with('errors',$validation->errors());
        }
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
    public function edit($id)
    {
        $p =  User::join('patients','users.id','=','patients.user_id')->where('users.id',$id)->get();
        return view('admin.pages.editpatient',compact('p'));
        
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
    public function destroy($id)
    {
        $p = User::find($id);
        $p->delete();
        session()->flash('success','  Patient Deleted');
        return redirect()->route('admin.patients');
    }
}
