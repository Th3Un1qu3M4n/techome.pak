<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    function index(){

    }
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        
        $check = Hash::check($req->password, $user->password);
        
        ;
        if($user && $check){
            $req->session()->put('user',$user);
            return redirect('/');
        }else{
            return View('login');
        }
        
    }
}
