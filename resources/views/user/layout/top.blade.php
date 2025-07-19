<div class="container-fluid topbar px-0 d-none d-lg-block">
            <div class="container px-0">
                <div class="row gx-0 align-items-center" style="height: 45px;">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                            <a href="#" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>{{ $company->phone }}</a>
                            <a href="#" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>{{ $company->email }}</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex align-items-center justify-content-end pp">
                            <a href="{{ $company->facebook }}" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-facebook-f text-white"></i></a>
                            <a href="{{ $company->whatsapp  }}" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-whatsapp"></i></a>
                            <a href="{{ $company->instagram  }}" class="btn btn-primary btn-square rounded-circle nav-fill me-3"><i class="fab fa-instagram text-white"></i></a>
                            <a href="{{ $company->linkdin  }}" class="btn btn-primary btn-square rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>