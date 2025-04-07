<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login(){
        $title = "Welcome to admin page!";
        return view('auth.login')->with('title',$title);
    }

    public function home(){
        $title = "Welcome to admin page, ";
        $user = Auth::user()->name;
        return view('admin.home')
                    ->with('title',$title)
                    ->with('user',$user);
    }

}
