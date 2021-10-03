@extends('layouts.backend')
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active" >Posts</li>
                    </ol>
                </div>
                <h4 class="page-title">Basic Tables</h4>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
       

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">All Post</h4>
                    

                    <div class="table-responsive">
                        @include('dashboard.parts.alert.success')
                        @include('dashboard.parts.alert.error')
                        <table   class="table table-bordered mb-0 table-centered">
                          
                            <thead>
                                
                            <tr >
                                <th>#</th>
                                <th>logo</th>
                                <th style="width: 300px">title</th>
                                <th>image/video</th>
                                <th>Special</th>

                                <th>action</th>

                            </tr>
                            </thead >
                            <tbody >
                                @foreach ($posts  as $key =>$item)
                                    
                                
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td><img src="{{ asset('uploads/'.@$item->resorese->image) }}" width="100" height="80" alt=""></td>
                                    <td>{{@$item->title}}</td>
                                    <td>{{@$item->ad_format}}</td>

                                <td><input type="checkbox" data-id="{{ @$item->id }}" name="special" class="js-switch" {{ @$item->special == '1' ? 'checked' : '' }}>
                                </td>
                                <td>      
                                    {{-- <a class="btn btn-primary" href="{{ route('posts.edit',@$item->_id) }}">Edit</a> --}}

                                    <a class="btn btn-primary" href="{{ route('posts.edit',@$item->_id) }}">Edit</a>
                                    {{-- @endcan --}}
                                    {{-- @can('role-delete') --}}
                                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', @$item->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                   
                                </td>
                            </tr>
                            @endforeach
                             
                            </tbody>
                        

                        </table>

                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
    </div> 
</div>
    
@endsection
@section('script')
    



<script>
    $(document).ready(function(){
    $('.js-switch').change(function () {
        let special = $(this).prop('checked') === true ? 1 : 0;
        let post_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('post.update.special') }}',
            data: {'special': special, 'post_id': post_id},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
@endsection