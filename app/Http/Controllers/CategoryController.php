<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function  index()
    {
        return view('admin.category.all_category');
    }
    public function  add()
    {
        return view('admin.category.add_category');
    }
}
