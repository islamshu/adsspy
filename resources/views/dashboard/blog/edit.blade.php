@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active"><a >Edit Blog </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Blog</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Edit Blog</h4>
                @include('dashboard.parts.alert.success')
                @include('dashboard.parts.alert.error')
                <form action="{{ route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('put')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image"  class="form-control image logo" >
                                </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <img src="{{asset('uploads/'.$blog->image)}}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="image" alt="">
                        </div>
                        
                       
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{$blog->title}}"  required >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="short_dec">{{$blog->short_dec}}</textarea>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="elm1" name="long_dec">{{$blog->long_dec}}</textarea>
                                </div>
                            </div>                    
                        </div>
                    
           

                        
    
    
                    </div>
                    <button class="btn btn-gradient-primary" type="submit">Submit form</button>
                </form>
                                                                                      
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>


@endsection