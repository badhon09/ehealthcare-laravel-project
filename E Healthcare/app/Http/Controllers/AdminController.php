<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;
use File;

class AdminController extends Controller
{
   function createadmin(Request $req){

    $user=New User;
    $user->name=$req->fullname;
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
}
