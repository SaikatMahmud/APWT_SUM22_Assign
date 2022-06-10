<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function home()
    {
        return view('user.homepage');
    }

    public function reg()
    {
        return view('user.register');
    }

    public function regSubmit(Request $rq)
    {
        $this->validate(
            $rq,
            [
                "name" => "required",
                "email" => "required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",
                "password" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
                "confirmPass" => "required|min:8|same:password",
            ],
            [
                "password.regex" => "Password must contain upper/lower case, number, symbol and minimum 8 digits",
                "confirmPass.same" => "Both passsword not matched"
            ]
        );
        $cl = new client();
        $cl->name = $rq->name;
        $cl->email = $rq->email;
        $cl->password = bcrypt($rq->password);
        $cl->type = $rq->type ?? 'User';
        $cl->save();
        if ($cl->save())
            return redirect()->route('user.home');

        return "Registration failed";
    }

    public function login()
    {
        return view('user.login');
    }

    public function verifyLogin(Request $rq)
    {
        $credentials = $rq->validate(
            [
                "email" => "required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",
                "password" => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&])[A-Za-z\d@#$!%*?&]{8,}+$/",
            ]
        );

        if (Auth::attempt($credentials)) {

            $user = client::where('email', $rq->email)->first(['type']);
            if ($user->type == 'Admin')
                return redirect()->route('user.dash.admin');
            return redirect()->route('user.dash');
        }

        else
            return back()->withErrors(
                ["email" => "Email or password not found"]);
    }

    public function dash()
    {
        $user = client::all();
        return view('user.dash')->with('clients', $user);;
    }
    public function dashAdmin()
    {
        $user = client::all();
        return view('user.dashAdmin')->with('clients', $user);;
    }

    public function details($id)
    {
        $user = client::where('id', '=', $id)
            ->first(['name', 'email', 'type']);
        return view('user.details')
            ->with('id', $id)
            ->with('name', $user->name)
            ->with('email', $user->email)
            ->with('type', $user->type);
    }
}
