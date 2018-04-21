<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    function index(){
        //Eloquent
        $users = User::all();
        return response()->json($users,200);

    }

    function create(){
        $user = new User();
        $user->name = "jfalbel";
        $user->email = "jfalbel@gmail.com";
        $user->password = "xxxx";

        return response()->json([$user],201);

    }
}
