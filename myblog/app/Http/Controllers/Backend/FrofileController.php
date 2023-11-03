<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FrofileController extends Controller
{
    function frofile(){
        return view('backenduser.userfrofile');
    }
    function frofileupdate(Request $request){
        $request->validate([
            'name'=>"required|string|max:30",
            'email'=>'required|email|unique:users,email,'.auth()->user()->id,
            'profile-img'=>'nullable|mimes:jpg,png',
            
        ],
        [
            'name'=>[
                'required'=>'Enter your name',
            ]
            
        ]
    
    
    
    );
        // // update
    if($request->hasFile('profile-img')){
        // $path = $request->file('image')->storeAs($customDirectory, $customFileName, 'local');
        // 'local' is the disk name (you can replace it with the appropriate disk name).
        $path = time().rand().'-shovo.'.$request->file('profile-img')->getClientOriginalExtension();
       
        $request->file('profile-img')->storeAs('public/logo', $path);


    }

    $use = User::find(auth()->user()->id);
    // dd($use);
    $use->name=$request->name;
    $use->email=$request->email;
    if($request->hasFile('profile-img')){
       $use->imgename= $path ;

    }
    $use->save();
    


  

    // uplod file into data base


        
    }


    // password update
    function passwordupdatte(Request $request){
        $request->validate([
            'old' => 'required|current_password',//current_password ata dea data base ar old password chak kora jai
            'password' =>  'required|min:8|confirmed|different:old',
            'password_confirmation'=>'required',

        ]);
        // password update
        $user = user::find(auth()->user()->id);
        // dd($user);
        $user->password= Hash::make($request->password);//password ecift korarr jonno Hash:make($password)
        $user->save();
        return back();

    }
    
    
    
}

