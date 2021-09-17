@extends('layouts.backend')
@section('content')
    
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active">edit post</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Post</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">        
                <h4 class="mt-0 header-title">Edit Post</h4>
              
                <form action="{{ route('posts.update',$post->id) }}" method="post">
                    @csrf @method('put')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Logo Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" name="logo" value="{{ $post->logo }}" required id="example-text-input">
                                </div>
                            </div>
                         
                                               
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="page_name" value="{{ $post->page_name }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Image link </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="image_link" value="{{ $post->image_link }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="page_link" value="{{ $post->page_link }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Ads link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="ads_link" value="{{ $post->ads_link }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Country</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="country" value="{{ $post->country }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Language</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="lang" value="{{ $post->lang }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0 row">
                                <label style="margin-left: 25px" class="col-md-3 my-1 control-label">Gender</label>
                                <div class="col-md-6" style="margin-left:-177px">
                                    <div class="form-check-inline my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio7" name="gender" @if($post->gender == 'MALE') checked @endif value="MALE" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio7">Male</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio8" name="gender" @if($post->gender == 'Female') checked @endif value="Female" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio8">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-check-inline my-1">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio9" name="gender" @if($post->gender == 'All') checked @endif value="All" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio9">All</label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> 
                        </div>
                        <div class="col-lg-8" style="margin-top: 10px">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Interested</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="interested" value="{{ $post->interested }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Age</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="age" value="{{ $post->age }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">likes number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="likes" value="{{ $post->likes }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Comments number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="comments" value="{{ $post->comments }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Shares number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="shares" value="{{ $post->shares }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Button name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="button" value="{{ $post->button }}" required id="example-text-input">
                                </div>
                            </div>                    
                        </div>
                        
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description">{{ $post->description }}</textarea>
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