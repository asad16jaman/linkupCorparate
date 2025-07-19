@extends('user.layout.app')
@section("title")
    home page
@endsection

@section('maincontent')

      



        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="bg-breadcrumb-single"></div>
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        
        <!-- About Start -->
             @include("user.home.about",['about'=> $about])
        <!-- About End -->


        <!-- Team Start -->
        @include("user.home.team",['teams'=>$teams])
        <!-- Team End -->


     @endsection