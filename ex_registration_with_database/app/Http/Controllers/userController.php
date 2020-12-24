<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(Request $request){


        $name           =request('name');
        $email          =request('email');
        $username       =request('username');
        $phone          =request('phone');
        $password       =request('password');

        // $allusers    =array();
        // $allusers    =[$username,$name,$phone,$email];



        $validatedInputs=$request->validate([
            "email"     =>"required|email",
            "password"  => "required|min:8|max:16",
            "username"  => "required",
            "phone"     => "required|digits:14 ",
            "name"      => "required"




        ]);


        $allusers       =[];
        $allusers       =[$username,$name,$phone,$email];



        return view ('userstable', [
            "allusers"=>$allusers,
        ]);


    }


}

