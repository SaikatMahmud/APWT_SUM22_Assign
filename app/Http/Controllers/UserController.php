<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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
                "name"=>"required", 
                "email"=>"required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",
                "password"=>"required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
                "confirmPass"=>"required|min:8|same:password",
            ],
            [
                //"password.regex"=>"Password must contain upper case, lower case, number and special characters"
            ]
            );
            $cl=new client();
            $cl->name= $rq->name;
            $cl->email= $rq->email;
            $cl->password=bcrypt($rq->password);
            $cl->type= $rq->type ?? 'User';
            $cl->save();
    } 

    public function login(){
        return view('user.login');
    }

    public function verifyLogin(Request $rq)
    {
        $credentials = $rq->validate(
        [
            "email"=>"required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",
            "password"=>"required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
        ]);
 //return $credentials;
        if (Auth::attempt($credentials)){
           //return "verified";
            return redirect()->route('user.dash');
        }
        return "not verified";
        
        // else
        // return back()->withErrors(
        //     ["email"=>"Not matched"]
        // );
    }

    public function dash(){
        return view('user.dash');
    }
}