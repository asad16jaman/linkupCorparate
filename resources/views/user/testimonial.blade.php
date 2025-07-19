@extends('user.layout.app')
@section("title")
    home page
@endsection

@section('navbar')
     @include('user.layout.navbar',['page'=>'page'])
@endsection

@section('maincontent')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="bg-breadcrumb-single"></div>
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-5 mb-4 wow fadeInDown" data-wow-delay="0.1s">Testimonial</h4>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Testimonial</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Testimonial Start -->
             @include("user.home.client",compact(['clients']))
        <!-- Testimonial End -->

     @endsection