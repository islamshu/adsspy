@extends('layouts.backend')
@section('content')
    @section('css')

 
    
    @endsection
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index')}}">Posts</a></li>
                        <li class="breadcrumb-item active">Edit post</li>
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
                <h4 class="mt-0 header-title">Create Post</h4>
              
                <form action="{{ route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="row">
                        {{-- <div class="col-lg-7">
                            
                            <div class="custom-file">
                                <input type="file" name="page_logo"  class="custom-file-input image page_logo" >
                                <label class="custom-file-label ">page logo</label>
                            </div>
                                               
                        </div>
                        
                        <div class="form-group">
                            <img src="{{ asset('uploads/'.$post->resorese->page_logo) }}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="page_logo" alt="">
                        </div>

                        <div class="col-lg-7">
                            
                            <div class="custom-file">
                                <input type="file" name="image"  class="custom-file-input image image" >
                                <label class="custom-file-label ">Image</label>
                            </div>
                                               
                        </div>
                        
                        <div class="form-group">
                            <img src="{{ asset('uploads/'.$post->resorese->image) }}"  style="width: 100px" class="img-thumbnail image-preview" data-preview="image" alt="">
                        </div>
                        @if( $post->resorese->video != null)

                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="example-text-input" class="col-md-3 col-form-label text-right">video post</label>
                                
                            </div>                    
                        </div>
                        
                        
                        <div class="col-lg-2">
                            <div class="form-group ">
                                @php
                                $vidoo =  URL::to('/').'/uploads'.$post->resorese->video;
                                @endphp
                                <video   width="200" height="200"  poster="{{ asset('uploads/'.$post->resorese->image) }}" >
                                    <source
                                        src="{{ $vidoo }}"
                                        type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                </video>
                            </div>                    
                        </div>
                        @endif
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Upload new video</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="video" placeholder="add video link"   >
                                </div>
                            </div>                    
                        </div>
                         --}}
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="page_name" value="{{ $post->page_name}}"  >
                                </div>
                            </div>                    
                        </div>
                     
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Page link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->page_link }}" name="page_link"  >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post link</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->post_link }}" name="ads_link"  >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Category</label>
                                <div class="col-sm-10">
                                    @php
                                 $catsss = explode(',',$post->category);
                                    
                                                @endphp
                                    <select name="category[]" class="select2 mb-3 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                    
                                        @foreach ($category as $item)
                                       <option value="{{ $item }}" {{ in_array($item,  $catsss) ? 'selected' : ''   }} >{{ $item }}</option>

                                       @endforeach
                                    </select>                                </div>
                            </div>                    
                        </div>
                      
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Country</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->country }}" name="country"   >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Post Format</label>
                                <div class="col-sm-10">
                                    <select name="ad_format" class="form-control" id="">
                                        <option value="image" @if($post->ad_format == 'image' )selected @endif>image</option>
                                        <option value="video" @if($post->ad_format == 'video' ) selected @endif>video</option>
                                    </select>
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Language</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->lang }}" name="lang"   >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Gender</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->gender }}" name="gender"   >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8" style="margin-top: 10px">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Interested</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->interested }}" name="interested"  >
                                </div>
                            </div>                    
                        </div>
                        
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Age</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="age"  value="{{ $post->age }}"  >
                                </div>
                            </div>                    
                        </div>
                      
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">objective</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $post->button }}" name="button"   >
                                </div>
                            </div>                    
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Title Post</label>
                                <div class="col-sm-10">
                                    <textarea class="elm1" name="title">{{ $post->title}}</textarea>
                                </div>
                            </div>                    
                        </div>
                         
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label text-right">Description Post</label>
                                <div class="col-sm-10">
                                    <textarea class="elm1" name="Ad_Description">{{ $post->Ad_Description}}</textarea>
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
@section('script')
<script src="{{asset('plugins/moment/moment.js ')}} "></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js ')}} "></script>
<script src="{{asset('plugins/select2/select2.min.js ')}} "></script>
<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js ')}} "></script>
<script src="{{asset('plugins/timepicker/bootstrap-material-datetimepicker.js ')}} "></script>
<script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js ')}} "></script>
<script src="{{asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js ')}} "></script>
<script src="{{ asset('assets/pages/jquery.forms-advanced.js') }}"></script>
<script src="{{asset('plugins/moment/moment.js')}}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('plugins/select2/select2.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>

<script>
    $('.select2-multi').select2();
</script>
@endsection