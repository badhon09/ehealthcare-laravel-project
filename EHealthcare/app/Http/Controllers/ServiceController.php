<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

  
use GuzzleHttp\Client;

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

        $client = new Client();
       // $request = $client->post('http://127.0.0.1:3000/services/delete/'.$id);
        $resp = $client->post('http://127.0.0.1:3000/services/add',[

            'form_params' => [
                'name'=>$req->name,
                'price' =>$req->fee,
                

            ]

        ]);
        
       

     /*   $service=New service;
        $service->name=$req->name;
        $service->price=$req->fee;

        $service->save();
    */

      
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

    $client = new Client();
    $request = $client->post('http://127.0.0.1:3000/services/delete',[

        'form_params' => [
            'id'=>$id
           
            

        ]

    ]);

    session()->flash('success',' Service Delete Successfully');
    return redirect()->route('admin.services');
   
    
    
    }
}
