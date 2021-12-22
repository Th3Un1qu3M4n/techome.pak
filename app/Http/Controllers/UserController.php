<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){

    }
    function login(Request $req){
        return $req->input();
    }
}
