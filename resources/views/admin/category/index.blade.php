@extends('admin.layout.admin_app')

@section('admin_content')

    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ URL::to('/dashboard') }}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{ URL::to('/dashboard') }}">Category</a></li>
    </ul>

    <div class="row-fluid sortable">

        <div class="box span12">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>View All Category</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>category_name</th>
                        <th>category_description</th>
                        <th>publication_status </th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                     <tr>

                        <td>{{ $category->id }}</td>
                        <td class="center">{{ $category->category_name }}</td>
                        <td class="center">{{ $category->category_description }}</td>

                        <td class="center">
                            @if($category->publication_status == 1)
                            <span class="label label-success">Activated</span>
                                @else
                                <span class="label label-danger">Deactivated</span>
                            @endif

                        </td>

                        <td class="center">
                            @if($category->publication_status == 1)
                            <a class="btn btn-danger" href="{{ URL::to('/category/'.$category->id) }}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            @else
                                <a class="btn btn-success" href="{{ URL::to('/category/'.$category->id) }}">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            @endif

                        </td>
                         <td>
                             <a class="btn btn-info" href="{{ route('categories.edit', $category->id)}}">
                                 <i class="halflings-icon white edit"></i>
                             </a>
                         </td>

                         <td>

                             <form  id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy',$category->id) }}" method="post" >

                                 {{ csrf_field() }}
                                 {{method_field('DELETE')}}

                                 <a href=""  class="btn btn-danger" onclick="
                                         if(confirm('Are you sure ,You Want to delete this ? '))
                                         {
                                         event.preventDefault();document.getElementById('delete-form-{{ $category->id }}').submit();
                                         }
                                         else{
                                         event.preventDefault()
                                         }"><span class="halflings-icon white trash"></span></>
                             </form>

                         </td>

                         {{--<a class="btn btn-danger" href="{{ route('categories.destroy', $category->id) }}">--}}
                             {{--<i class="halflings-icon white trash"></i>--}}
                         {{--</a>--}}
                    </tr>

                    @endforeach
                    </tbody>
                </table>

                {{--{{ $categories->links() }}--}}
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection