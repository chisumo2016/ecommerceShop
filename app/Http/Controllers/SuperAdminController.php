<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    //
    public function logout()
    {
        Session::put('admin_name',null);
        Session::put('id', null);
        return Redirect::to('/admin');
    }
}
