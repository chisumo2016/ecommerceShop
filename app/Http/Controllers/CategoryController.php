<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(5);
        return view('admin.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Validate the category input
        request()->validate([
            'category_name' =>'required',
            'category_description' =>'required',
            'publication_status' =>'required'
        ]);

        //insert into database
        $category = new  Category;
        $category ->category_name =$request->get('category_name');
        $category ->category_description =$request->get('category_description');
        $category ->publication_status =$request->get('publication_status');
        $category->save();

        return redirect()->route('categories.index')->with('success','Category created successfully');

        //dd($validatedData);
        //Category::forceCreate($validatedData);
        //Category::forceCreate(request(['category_name','category_description','publication_status']));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$category= Category::find($id);
        //return view ('admin.category.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view ('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the category input

        request()->validate([
            'category_name' =>'required',
            'category_description' =>'required',
            'publication_status' =>'required'
        ]);

        //update into database
        $category = Category::find($id);
        $category ->category_name =$request->get('category_name');
        $category ->category_description =$request->get('category_description');
        $category ->publication_status =$request->get('publication_status');
        $category->save();

        return redirect()->route('categories.index')->with('success','Category  Updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete  Category
        $category = Category::find($id);
        $category->destroy();
        return back();

    }

    public function  UpdateStatus($category_id)
    {
        $category = Category::findOrFail($category_id);
        if($category->publication_status !=0){
            $category->update([

                'publication_status' => 0
            ]);

            $status ='Deactivated';
        }else{
            $category->update([

                'publication_status' => 1
            ]);

            $status ='Activated';
        }

        return redirect()->route('categories.index')->with('success','Category'.$status.' successfully');
    }
}


//public function  unactive($category_id)
{
//       DB::table('categories')
//           ->where('id',$category_id)
//           ->update(['publication_status' => 0]);
//          return redirect()->route('categories.index')->with('success','Category  Unactive successfully');
}