<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function home(){
        // $getdata = DB::table('hosted')->get();
        $getdata = DB::table('icons')->get();
        return view('users.home',compact('getdata'));
    }

    // public function addIcons(){

    //     $getdata = DB::table('icons')->get();
    //     return view('users.home',compact('getdata'));

    // }
}
