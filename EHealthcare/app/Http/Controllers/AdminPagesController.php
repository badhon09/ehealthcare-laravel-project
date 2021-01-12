<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\blog;
use App\service;
use App\doctor;
use App\consult;
use App\payment;
use Yajra\Datatables\DataTables;
use DB;
use Charts;
use Illuminate\Support\Facades\Auth;
class AdminPagesController extends Controller
{
   function dashboard(){
       $tdoctor = User::where('type','doctor');
       $tpatient = User::where('type','patient');
       $cr = consult::where('status','pending');
       $tservice = service::get();
       $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('type','patient')
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Patients")
			      ->elementLabel("Total Patients")
                  ->dimensions(1000, 500)
                  ->colors(['#C5CAE9', '#283593'])
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
       return view('admin.pages.dashboard',compact('tdoctor','tpatient','chart','tservice','cr'));
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
        $a = consult::where('status','pending')->get();
        return view('admin.pages.consultingrequest',compact('a'));
   }
 
   function consultingrequestsaccept($id){
    $a=consult::find($id);
    $a->status = 'accepted';
    $a->save();
    session()->flash('success',' Request accepted');
    return redirect()->route('admin.consultingrequests');
}

function consultingrequestsreject($id){
    $a=consult::find($id);
    $a->status = 'rejected';
    $a->save();
    session()->flash('success',' Request rejected');
    return redirect()->route('admin.consultingrequests');
}

    function profile(){
        
        return view('admin.pages.profile');
    }
    
    function getadmins(){
        $admins = User::all();
        return Datatables::of($admins)
        ->make(true);
    }
  

    public function update(Request $req,$id){

      
    
        $user=User::find($id);
        $user->name=$req->fullname;
       
        $user->email=$req->email;
       
        $user->contactno=$req->contactno;
        $user->save();
    
        session()->flash('success','  Admin Updated');
        return redirect()->route('admin.admins');
    
    
    
       }

       public function updatedoc(Request $req, $id){

        $user= User::find($id);
        $user->name=$req->fullname;
        $user->username=$req->username;
        $user->email=$req->email;
       
        $user->type='doctor';
        $user->contactno=$req->contactno;
       
       
        $user->save();



        
        
        $doctor =  doctor::find($id);
        $doctor->dob = $req->dob;
        $doctor->qualification = $req->qualification;
        
        $doctor->fee = $req->fee;
        
        $doctor->save();

        

        session()->flash('success','  Doctor Updated');
        return redirect()->route('admin.doctors');
        
    }

    function payment(){
        $p=payment::get();
        return view('admin.pages.payment',compact('p'));
    }

    function paymentprint($id){
        $p=payment::where('id',$id)->get();
        return view('admin.pages.printpayment',compact('p'));
    }

    function profileupdate(Request $req){
        $user=User::find(Auth::user()->id);
        $user->name=$req->fullname;
        $user->username=$req->username;
       
        $user->email=$req->email;
       
        $user->contactno=$req->contactno;
        $user->save();
    
        session()->flash('success','  profile Updated');
        return redirect()->route('admin.profile');
    }


    function searchdoc(Request $req){

       $doc = User::where('name' , 'like' , '%'.$req->search.'%')
       ->get();
       return response()->json($doc);

    }
      
 


}
