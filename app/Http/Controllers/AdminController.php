<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    //
    public  function  index()
    {
        return view('admin.login');
    }

    public  function  show_dashboard()
    {
        return view('admin.dashboard');
    }

    public function  dashboard(Request $request)
    {
       $admin_email   = $request->admin_email;
       $admin_password = md5($request->admin_password);
       $result = DB::table('admin')
                ->where('admin_email',    $admin_email )
                ->where('admin_password', $admin_password)
                ->first();

             if($result ){
                 Session::put('admin_name', $result->admin_name);
                 Session::put('admin_id',   $result->id);
                 return Redirect::to('/dashboard');
             }else{
                 Session::put('message', 'Email or Password Invalid');
                 return Redirect::to('/admin');

             }

    }
}

//                echo "<pre>";
//                print_r($result);
//                exit();