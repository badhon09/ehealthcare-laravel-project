<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\DataTables;
use App\User;
use Image;
use File;
use Validator;

class AdminController extends Controller
{
   function createadmin(Request $req){

    $validation = Validator::make($req->all(),[
        'name'=>'required | min:5',
        'username'=>'required | min:6',
        'email'=> 'required |unique:users,email',
        'password'=>'required|min:6',
        'contactno'=>'required|numeric|min:6',
    ]);

    if($validation->fails()){
        return redirect()
        ->route('admin.createadmins')->with('errors',$validation->errors());
    }

    $user=New User;
    $user->name=$req->fullname;
    $user->username=$req->username;
    $user->email=$req->email;
    $user->password=Hash::make($req->password);
    $user->type='admin';
    $user->contactno=$req->contactno;
    $image=$req->file('image');
    $img=time().'.'.$image->getClientOriginalExtension();
    $location=public_path('images/'.$img);
    Image::make($image)->save($location);
    $user->photo=$img;
    $user->save();

    session()->flash('success',' New Admin Added');
    return redirect()->route('admin.admins');

   }


   public function getadmin()
   {
       return Datatables::of(User::query())->make(true);
   }
}
