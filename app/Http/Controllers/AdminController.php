<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Models\User;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(AdminAuthMiddleware::class);
    // }
    public function admin (){
        return view('admin.admin');
    }
    function login(Request $re)
    {
        $data = $re->all();
        // dd($data);

        return view('admin.login');
    }
    public function loginPost (Request $request){
        // dd('no nhay vo day');

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {

            // Authentication passed...
            return redirect()->intended(route('admin'));
        }
        // dd('nho nhay vo day 1');
        return redirect(route('admin.login'))->with("error", "Login details are not valid");
    }
    public function memberlist(){
        $data['users'] = User::where('is_admin',2)->get();
        // dd( $data['users']);
        return view('admin.memberlist',compact('data'));
    }
    public function userlist(){
        $data['users'] = User::where('is_admin',null)->get();
        // dd( $data['users']);
        return view('admin.userlist',compact('data'));
    }
    public function editmemberlist(){

    }
    public function deleteuserlist(request $re){
        $id = $re->id;
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.userlist');
    }
    public function edituserlist (request $re){
        $id = $re->id;
        $data['users'] = User::where('id',$id)->first();
        return view('admin.edituser',compact('data'));
    }
    public function  edituserlistpost (Request $re){
        $UpdateDetails = User::where('id', '=',  $re->id)->first();
        $UpdateDetails->name = $re->name;
        $UpdateDetails->email = $re->email;
        $UpdateDetails->is_admin = $re->role;
        $UpdateDetails->save();
        return redirect()->route('admin.userlist');
    }



}
