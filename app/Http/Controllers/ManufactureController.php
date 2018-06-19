<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manufactures = Manufacture::all();
        return view('admin.manufacture.index',compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.manufacture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validate the category input
        request()->validate([
            'manufacture_name' =>'required',
            'manufacture_description' =>'required',
            'publication_status' =>'required'
        ]);

        //insert into database
        $manufacture = new  Manufacture;
        $manufacture ->manufacture_name =$request->get('manufacture_name');
        $manufacture ->manufacture_description =$request->get('manufacture_description');
        $manufacture ->publication_status =$request->get('publication_status');
        $manufacture->save();

        return redirect()->route('manufactures.index')->with('success','Manufacture created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $manufacture = Manufacture::find($id);
        return view ('admin.manufacture.edit',compact('manufacture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validate the category input
        request()->validate([
            'manufacture_name' =>'required',
            'manufacture_description' =>'required',
            'publication_status' =>'required'
        ]);
        $manufacture = Manufacture::find($id);
        $manufacture ->manufacture_name =$request->get('manufacture_name');
        $manufacture ->manufacture_description =$request->get('manufacture_description');
        $manufacture ->publication_status =$request->get('publication_status');
        $manufacture->save();

        return redirect()->route('manufactures.index')->with('success','Manufacture Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Delete  Category
        Manufacture::where('id', $id)->delete();
        return redirect()->route('manufactures.index')->with('success','Manufacture  deleted successfully');
    }


    public function  UpdateStatus($manufacture_id)
    {

        $manufacture = Manufacture::findOrFail($manufacture_id);
        if($manufacture->publication_status !=0){
            $manufacture->update([

                'publication_status' => 0
            ]);

            $status ='Deactivated';
        }else{
            $manufacture->update([

                'publication_status' => 1
            ]);

            $status ='Activated';
        }

        return redirect()->route('manufactures.index')->with('success','Manufacture' .$status. ' successfully');
    }
}
