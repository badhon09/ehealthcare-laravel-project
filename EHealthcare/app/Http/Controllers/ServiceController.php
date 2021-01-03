<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;


class ServiceController extends Controller
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
        $service=New service;
        $service->name=$req->name;
        $service->price=$req->fee;
        $service->user_id=Auth::user()->id;
        $image=$req->file('image');
        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('images/'.$img);
        Image::make($image)->save($location);
        $service->photo=$img;

        $service->save();
        session()->flash('success',' New Service Created Successfully');
        return redirect()->route('admin.services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $client = new \GuzzleHttp\Client();
    $request = $client->post('http://127.0.0.1:3000/services/delete/'.$id);

    $patient = json_decode($request->body());

   
    session()->flash('success','  Service Deleted Successfully');
    return redirect()->route('admin.services');
    //$response = $request->getBody();
   
    //dd($response);
             //HTTP request from node application
            // $resp = Http::get('http://127.0.0.1:3000/services/delete/'.$id);
        
             //echo $resp->body(['id']);
            // $patient = json_decode($resp->body()); //parsing the json data
             //print_r($v->id);
             //$user = User::where('id', $id)->first();
             //$patient = Patient::where('user_id', $id)->first();
             //return view('profile.index')->with('user', $user)->with('patient', $patient);
     
            // return view('profile.index')->with('patient', $patient);

           
     

        /*

        

        $service = service::find($id);
        $service->delete();
        session()->flash('success','  Service Deleted Successfully');
        return redirect()->route('admin.services');

        */
    }
}
