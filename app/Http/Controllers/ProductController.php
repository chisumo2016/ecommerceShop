<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products  = Product::with('categories')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->get();
            return view('admin.product.index',compact('products'));


//        $products = Product::all();
//        $categories = Category::all();
//
//        return view('admin.product.index',[
//              'products' =>$products,
//              'categories' =>$categories,
//            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories   = Category::where('publication_status', 1)->get();
        $manufactures = Manufacture::where('publication_status', 1)->get();
        return view('admin.product.create',
            [
                'categories' =>   $categories,
                'manufactures' =>  $manufactures
            ]);
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
            'product_name' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|image',
            'product_size' => 'required',
            'product_color' => 'required',
            'publication_status' => 'required'
        ]);


        $product = new Product;

        if ($request->hasFile('product_image')) {
            $product_image  = $request->file('product_image');
            $filename       = time() . '.' .$product_image->getClientOriginalExtension();
            $location       = public_path('image/' .$filename);
            Image::make($product_image)->resize(800, 400)->save($location);

            //Save filename
            $product->product_image =  $filename;
        }

        $product->product_name                  = $request->product_name;
        $product->category_id                   = $request->category_id;
        $product->manufacture_id                = $request->manufacture_id;
        $product->product_short_description     = $request->product_short_description;
        $product->product_long_description      = $request->product_long_description;
        $product->product_price                 = $request->product_price;
        $product->product_size                  = $request->product_size;
        $product->product_color                 = $request->product_color;
        $product->publication_status            = $request->publication_status;

        $product->save();

        $product->categories()->sync($request->categories);

        return redirect()->route('products.create')->with('success', 'Product created successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
