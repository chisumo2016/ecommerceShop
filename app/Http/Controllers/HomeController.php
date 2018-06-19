<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function  index()
    {
        $categories = Category::where('publication_status', 1)->get();
        return view('pages.index', compact('categories'));
    }
}
