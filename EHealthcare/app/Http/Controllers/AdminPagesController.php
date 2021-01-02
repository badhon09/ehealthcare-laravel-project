<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use App\service;
use Yajra\Datatables\DataTables;
use DB;
use Charts;
class AdminPagesController extends Controller
{
   function dashboard(){
       $tdoctor = User::where('type','doctor');
       $tpatient = User::where('type','patient');
       $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('type','patient')
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Patients")
			      ->elementLabel("Total Patients")
                  ->dimensions(1000, 500)
                  ->colors(['#C5CAE9', '#283593'])
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
       return view('admin.pages.dashboard',compact('tdoctor','tpatient','chart'));
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
    $service = service::get();
    return view('admin.pages.services',compact('service'));
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
       $blog = blog::join('users','blogs.user_id','=','users.id')->select('blogs.id as bid','blogs.*','users.*')->get();
    return view('admin.pages.blogs',compact('blog'));
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
