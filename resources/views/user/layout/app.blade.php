
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield("title")</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="{{ asset('assets/user/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <link
      rel="icon"
      href="{{ asset('assets/admin/img/titleicon.svg') }}" 
      type="image/x-icon"
    />
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">
        <style>
            .topbar{}
            .topbar > div{}
            .topbar > div > a{
                color:#fff
            }
            .topbar > div > a > i{}

            
        </style>
        @yield('style')
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
            @include('user.layout.top')
        <!-- Topbar End -->


        <!-- Navbar & Hero Start -->
            @yield('navbar')
        <!-- Navbar & Hero End -->

    
        <!-- Main Content will generate hare -->
        @yield('maincontent')
        <!-- ----- -->

        <!-- Footer Start -->
        @include('user.layout.footer')
        <!-- Footer End -->

        
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 offset-md-3 text-center text-md-center mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-primary"><i class="fas fa-copyright text-light me-2"></i>Link Up Technology</a>, All right reserved.</span>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/lightbox/js/lightbox.min.js') }}"></script>
    

    <!-- Template Javascript -->
    <script src="{{ asset('assets/user/js/main.js') }}"></script>
    </body>

    <script>
        

    </script>

    @stack('script')




</html>