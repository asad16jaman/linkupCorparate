@extends('admin.layout.app')

@section('title', 'Admin Page')

@section('style')
<style>
    .table > tbody > tr > td{
        padding: 0px !important;
        margin-bottom: 2px;
    }
    .iconsize{
        font-size: 15px;
    }
    .profileImg{
        width: auto;
        height: 100px; 
        object-fit: cover;
        border: 2px dashed #ccc;
        border-radius: 6px;
    }
    .tablepicture{
        width: 30px;
        height: 30px;
        object-fit: fill;
    }
    .headbg > tr > th{
        background-color: #3c5236;
        color: #fff;
    }
</style>
@endsection

@section('bodyContent')

    <div class="container">

        <div class="page-inner">

            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h4 class="text-center">Create User</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-3 ">
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">User Name :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1" {{ $editUser ? 'readonly' : '' }} name="username" value="{{ $editUser ? $editUser->username : "" }}"
                                            placeholder="Enter Username">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Full Name :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1"  name="fullname" value="{{ $editUser ? $editUser->fullname : "" }}"
                                            placeholder="Enter Full Name">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">User Email</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="email" value="{{ $editUser ? $editUser->email : "" }}" name="email" class="form-control p-1" id="" placeholder="Enter Email">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        <label for="type">User Type</label>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <select name="type" class="form-control p-1">
                                        @if($editUser)
                                        <option value="customer">Customer</option>
                                        <option @selected( $editUser->type == 'admin' ) value="admin" >Admin</option>

                                        @else
                                            <option value="customer">Customer</option>
                                            <option value="admin" >Admin</option>
                                        @endif
                                        <!-- <option value="staff">Staff</option>
                                        <option value="partner">Partner</option> -->
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <label for="password">Password :</label>
                                    </div>
                                    <div class="col-md-9 col-12">
                                          <input type="password" class="form-control p-1" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex justify-content-center mt-1">
                                         <label for="imageInput" style="cursor: pointer;">
                                            <!-- (placeholder) -->
                                            <img id="previewImage" 
                                                src="{{ ($editUser && $editUser->picture)  ? asset('storage/'.$editUser->picture) : asset('assets/admin/img/demoProfile.png') }}" 
                                                alt="Demo Image" 
                                                class="profileImg"
                                                style="">
                                        </label>

                                        <!-- hidden input -->
                                        <input type="file" name="picture" id="imageInput" name="image" accept="image/*" style="display: none;">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                           <input type="submit" value="Submit" class="btn btn-primary me-3 p-2">
                        </div>
                    </div>
                </form>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <h5 class="card-title ">ALL Users</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="basic-datatables_length">
                                                <label>Show <select
                                                        name="basic-datatables_length" aria-controls="basic-datatables"
                                                        class="form-control form-control-sm" onchange="perpageItem(this)">
                                                        <option value="3" >3</option>
                                                        <option value="4" @selected( request()->query('numberOfItem') == 4 )>4</option>
                                                        <option value="50" @selected(request()->query('numberOfItem') == 50)>50</option>
                                                        <option value="100" @selected(request()->query('numberOfItem') == 100) >100</option>
                                                    </select> entries</label>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <label class="d-flex justify-content-end">Search:
                                                    <form id="searchform">
                                                        @csrf
                                                        <input type="search" value="{{ request()->query('search') }}" name="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="basic-datatables">
                                                    </form>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="basic-datatables"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="basic-datatables_info">
                                                <thead class="headbg">
                                                    <tr role="row bg-dark" >
                                                        <th style="width: 136.031px;">SL NO:</th>
                                                        <th style="width: 214.469px;">Picture</th>
                                                        <th style="width: 214.469px;">User Name</th>
                                                        <th style="width: 214.469px;">Full Name</th>
                                                        <th style="width: 101.219px;">Email</th>
                                                        <th style="width: 35.875px;">Type</th>
                                                        <th style="width: 81.375px;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                @forelse($allUsers as $user)
                                                    <tr role="row" class="odd" >
                                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                                        <td>
                                                        
                                                        @if($user->picture)
                                                            <img class="tablepicture" src="{{ asset('storage/'.$user->picture) }}" alt="user profile picture">
                                                        @else
                                                            <img class="tablepicture" src="{{ asset('assets/admin/img/demoProfile.png') }}" alt="user profile picture">
                                                        @endif

                                                        </td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->fullname ?? "None" }}</td>
                                                        
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->type }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            
                                                            <a href="{{ route('admin.users',['id' => $user->id]) }}" class="btn btn-info p-1 me-1">
                                                                <i class="fas fa-edit iconsize"></i>
                                                            </a>

                                                            <form action="{{ route('admin.user.delete',['id'=>$user->id]) }}" method="post">
                                                                @csrf
                                                                <!-- <input type="submit" value="Delete"> -->
                                                                 <button type="submit" class="btn btn-danger p-1"><i class="fas fa-trash-alt iconsize"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>there is no users</p>

                                                @endforelse
                                                    

                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end">
                                                @php
                                                    $nextCursor = $allUsers->nextCursor()?->encode();
                                                    $prevCursor = $allUsers->previousCursor()?->encode();
                                                @endphp

                                                {{-- Previous Button --}}
                                                @if($prevCursor)
                                                    <a href="{{ request()->fullUrlWithQuery(['cursor' => $prevCursor]) }}" class="btn btn-primary p-1">« Previous</a>
                                                @endif

                                                {{-- Next Button --}}
                                                @if($nextCursor)
                                                    <a href="{{ request()->fullUrlWithQuery(['cursor' => $nextCursor]) }}" class="btn btn-primary mx-3 p-1">Next »</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

@endsection

@push('script')
<script>
    function perpageItem(d){
        let itemNumber = d.value;
        let baseUrl = "{{ url()->current() }}"; // current route path without query

        const url = new URL(baseUrl, window.location.origin);
        @foreach(request()->query() as $key => $value)
            @if($key !== 'numberOfItem')
                url.searchParams.set('{{ $key }}', '{{ $value }}');
            @endif
        @endforeach

        url.searchParams.set('numberOfItem', itemNumber);
        window.location.href = url.toString();
    }


   

    document.getElementById('searchform').addEventListener('submit',function(e){
        e.preventDefault();
        let searchValue = e.target['search'].value ; 
        let baseUrl = "{{ url()->current() }}"; // current route path without query

        const url = new URL(baseUrl, window.location.origin);
        @foreach(request()->query() as $key => $value)
            @if($key !== 'search')
                url.searchParams.set('{{ $key }}', '{{ $value }}');
            @endif
        @endforeach
        console.log('kaj hosce..')
        url.searchParams.set('search', searchValue);
        window.location.href = url.toString();
    })


    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    })
</script>

@endpush