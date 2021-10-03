@extends('layouts.front')
@section('title')
<title>{{ general('title')  }}</title>
@endsection
@section('content')


      
@include('frontend.header')

</div>


<div class="content" data-spy="scroll" data-target="#navbar" data-offset="400">




@include('frontend.video')


@include('frontend.about')


@include('frontend.products')



@include('frontend.price')



@include('frontend.contactus')




@include('frontend.footer')

    
@endsection