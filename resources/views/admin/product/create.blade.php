@extends('admin.layout.admin_app')

@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Product</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_name" id="product_name" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Product Category</label>
                            <div class="controls">

                                <select id="selectError3" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category )
                                    <option value="{{ $category->id}}">{{ $category->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="selectError3">Manufacture Name</label>
                            <div class="controls">
                                <select id="selectError3" name="manufacture_id">
                                    <option>Select Manufacture</option>
                                    @foreach($manufactures  as $manufacture )
                                        <option value="{{ $manufacture->id}}">{{ $manufacture->manufacture_name }} </option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Short Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" id="product_short_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Long Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" id="product_long_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price" id="product_price" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Image</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="product_image" type="file" name="product_image">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_size" id="product_size" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="date01">Product Color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_color" id="product_color" >
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status :</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection