<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use PharIo\Manifest\Email;

class AuthManager extends Controller


{

    function login()
    {
        return view('login');
    }
    function registration()
    {
        return view('registration');
    }
    function loginPost(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'    ,
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $token = bin2hex(random_bytes(16));
        DB::table('register_token')->insert([
            'email' => $data['email'],
            'token' => $token,
            'user_id'=> $user->id
        ]);
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.',
            'url' => route('active'). '?token='.$token.'&user_id='.$user->id
        ];
        // dd($data['email']);
        Mail::to($data['email'])->send(new DemoMail($mailData));

        // return redirect(route('login'))->with("success", "Check your email address");
    }
    public function token(Request $request) {
        $token = $request->get("token");
        $user_id = $request->get("user_id");

        $user_token = DB::table('register_token')->where([
            'token' => $token,
            'user_id'=> $user_id
        ])->get();
        if (count($user_token) > 0) {
            $user = User::find($user_id);
            $user->deleted = 0;
            $user->save();
        } else {
            abort(404);
        }
        return view('acceptUser');
        // return ($request->input('token'));
    }
    function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
