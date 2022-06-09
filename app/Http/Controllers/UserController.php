<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        return view('user.homepage');
    }
    
    public function reg(){
        return view('user.register');
    }

    public function regSubmit(Request $rq){
        $this->validate($rq,
            [
                //"mobile"=>"required|max:15|min:11|regex:/^([8]{2}[0-9]{11})+$/i",
                "name"=>"required", 
                //"email"=>"required|regex:/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})$/",
                "email"=>"required",
                //"dob"=>"required |before: -18 years",
                "password"=>"required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]$/",
                "confirmPass"=>"required|min:8|same:password",
            ],
            [
                "mobile.regex"=>"Mobile no not valid",
                //"email.regex"=>"Enter a valid email",
                "password.regex"=>"Password must contain upper case, lower case, number and special characters"
            ]
            );
            $cl=new client();
            $cl->name= $rq->name;
            $cl->email= $rq->email;
            $cl->password= $rq->password;
            $cl->type= $rq->type ?? 'User';

            return "success";

    } 


}
