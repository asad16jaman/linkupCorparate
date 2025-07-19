@extends('user.layout.app')
@section("title")
    home page
@endsection

@section('navbar')
     @include('user.layout.navbar',['page'=>'contact'])
@endsection

@section('maincontent')

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="bg-breadcrumb-single"></div>
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-5 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Contact</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="contact-item">
                            <div class="">
                                <h4 class="text-primary">Contact Us</h4>
                                <h1 class="display-6">Get In Touch With Us</h1>
                                <!-- <p class="mb-0">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. </p> -->
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary btn-lg-square rounded-circle p-4"><i class="fa fa-home text-white"></i></div>
                                <div class="ms-4">
                                    <h4>Addresses</h4>
                                    <p class="mb-0">{{ $company->address }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary btn-lg-square rounded-circle p-2"><i class="fa fa-phone-alt text-white"></i></div>
                                <div class="ms-4">
                                    <h4>Mobile</h4>
                                    <p class="mb-0">{{ $company->phone }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="bg-primary btn-lg-square rounded-circle p-2"><i class="fa fa-envelope-open text-white"></i></div>
                                <div class="ms-4">
                                    <h4>Email</h4>
                                    <p class="mb-0">{{ $company->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                        <form method="post" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid
                                        @enderror" id="name" value="{{ old('name') }}" placeholder="Your Name" name="name">
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control @error('phone') is-invalid
                                        @enderror" id="phone" value="{{ old('phone') }}" placeholder="Phone" name="phone">
                                        <label for="phone">Your Phone</label>
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid
                                        @enderror" value="{{ old('email') }}" id="email" placeholder="Your Email" name="email">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('message') is-invalid
                                        @enderror" placeholder="Leave a message here" id="message" style="height: 160px" name="message">{{ old('message') }}</textarea>
                                        <label for="message">Message</label>
                                        @error('message')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded h-100">
                            {!! html_entity_decode($company->map) !!}
                            <div class="d-flex align-items-center justify-content-center bg-primary rounded-bottom p-4">
                                <div class="d-flex">
                                    <a class="btn btn-dark btn-lg-square rounded-circle me-2" href="{{ $company->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href="{{ $company->whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href="{{ $company->instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-dark btn-lg-square rounded-circle mx-2" href="{{ $company->linkdin }}"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- FAQ Start -->
             @include("user.home.fqa")
        <!-- FAQ End -->

     @endsection