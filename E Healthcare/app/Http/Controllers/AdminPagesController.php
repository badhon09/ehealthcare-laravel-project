<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\DataTables;
class AdminPagesController extends Controller
{
   function dashboard(){
       return view('admin.pages.dashboard');
    }
   function patients(){
        $patients = User::orderBy('id','desc')->where('type','patient')->get();
         return view('admin.pages.patients',compact('patients'));
    }
          
    function createpatients(){
        return view('admin.pages.createpatient');
    }
    function doctors(){
        $doctors = User::orderBy('id','desc')->where('type','doctor')->get();
        return view('admin.pages.doctors',compact('doctors'));
   }
         
   function createdoctors(){
       return view('admin.pages.createdoctor');
   }
   function services(){
    return view('admin.pages.services');
    }
     
function createservices(){
   return view('admin.pages.createservice');
    }

    function admins(){
        $admins = User::orderBy('id','desc')->where('type','admin')->get();
        return view('admin.pages.admins',compact('admins'));
   }
         
   function createadmins(){
       return view('admin.pages.createadmin');
   }
    
   function blogs(){
    return view('admin.pages.blogs');
    }
     
    function createblogs(){
   return view('admin.pages.createblog'); 
    }
    function consultingrequests(){
        return view('admin.pages.consultingrequests');
   }
 

    function profile(){
        return view('admin.pages.profile');
    }
    
    function getadmins(){
        $admins = User::all();
        return Datatables::of($admins)
        ->make(true);
    }
  

 


}
