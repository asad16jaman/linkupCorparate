<div class="container-fluid sticky-top px-0">
    <!-- left: 0; top: 0; width: 100%; height: 100%; -->
            <div class="position-absolute bg-dark" style="">
            </div>
            <div class="container-fluid px-0">
                <nav class="navbar navbar-expand-lg navbar-dark bg-white py-2 px-4">
                    <a href="index.html" class="navbar-brand p-0">
                        <h3 class="text-primary m-0"><i class="fas fa-donate me-3"></i>{{ $company->name }}</h3>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ route('home') }}" class="nav-item nav-link {{ ($page=='home') ? 'active' : "" }}">Home</a>
                            <a href="{{ route('about') }}" class="nav-item nav-link {{ ($page=='about') ? 'active' : "" }}">About</a>
                            <a href="{{ route('service') }}" class="nav-item nav-link {{ ($page=='service') ? 'active' : "" }}">Services</a>
                            <a href="{{ route('project') }}" class="nav-item nav-link {{ ($page=='project') ? 'active' : "" }}">Projects</a>
                            <div class="nav-item dropdown {{ ($page=='page') ? 'active' : "" }}">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0">
                                    
                                    <a href="{{ route('team') }}" class="dropdown-item">Our Team</a>
                                    <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                                    <a href="{{ route('fqa') }}" class="dropdown-item">FAQs</a>
                                    <!-- <a href="404.html" class="dropdown-item">404 Page</a> -->
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ ($page=='contact') ? 'active' : "" }}">Contact</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>