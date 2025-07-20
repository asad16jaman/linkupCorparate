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
        padding: 2px !important;
        margin-bottom: 2px;
    }

    .productimages {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.preview-img {
    position: relative;
    display: inline-block;
}
.preview-img img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.preview-img .remove-btn {
    position: absolute;
    top: -5px;
    right: -5px;
    background: red;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    cursor: pointer;
}

</style>
@endsection

@section('bodyContent')

    <div class="container">

        <div class="page-inner">

            <div class="card mb-1">
                <div class="card-header pt-1 pb-0">
                    <h4 class="text-center">Create Project</h4>
                </div>
                <form method="post" id="productForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-3 ">
                        <div class="row">

                            <div class="col-md-6 col-12">
                                
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Name :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <input type="text" class="form-control p-1 @error('name') is-invalid
                                        @enderror"  name="name" value="{{ $editItem ? $editItem->name : "" }}"
                                            placeholder="Enter Product Name">
                                        @error('name')
                                            <p class="text-danger">{{  $message }}</p>
                                        @enderror
                                        
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="description">Discription :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <textarea name="description" class="form-control @error('description') is-invalid
                                        @enderror" rows="2" id="">{{ $editItem ? $editItem->description : "" }}</textarea>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="long_Description">Long Discription :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <textarea name="logn_description" class="form-control" rows="4" id="">{{ $editItem ? $editItem->logn_description : "" }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-12">
                                        <div class="">
                                            <label for="email2">Catagory :</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <select name="category_id" id="" class="form-control">
                                            <!-- <option value="1">dkslk</option>
                                            <option value="1">dkslk</option> -->
                                            
                                            @if($editItem != null)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($editItem->category->id == $category->id) >{{ $category->name }}</option>
                                                    @endforeach
                                            @else

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            @endif

                                        </select>
                                    </div>
                                </div>
                               
                                <!-- multiple picture upload field hare start -->
                                <!-- <div class="row">
                                    
                                        <div class="col-md-3 col-12">
                                            <div class="">
                                                <label for="email2">Service Image </label>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-12">
                                           <input type="file" name="img[]" id="productImages" class="form-control" multiple accept="image/*">
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <div class="productimages d-flex flex-wrap gap-2"></div>
                                    </div>
                                </div> -->

                                 <!-- multiple picture upload field hare end -->

                                <div class="row">
                                    <div class="col-md-12 col-12 d-flex justify-content-center mt-1">
                                                    <label for="imageInput" style="cursor: pointer;">
                                                        <!-- (placeholder) -->
                                                        <img id="previewImage" 
                                                            src="{{ ($editItem && $editItem->picture) ?  asset('storage/'.$editItem->picture) : asset('assets/admin/img/demoUpload.jpg') }}" 
                                                            alt="Demo Image" 
                                                            class="profileImg"
                                                            style="">
                                                    </label>

                                                    <!-- hidden input -->
                                                    <input type="file" name="picture" id="imageInput" accept="image/*" style="display: none;">
                                                </div>
                                                @error('photo')
                                                    <p class="text-danger text-center">{{ $message }}</p>
                                                 @enderror
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
                            <h5 class="card-title ">ALL Services</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        
                                        <div class="col-sm-12 col-md-6 offset-md-6">
                                            <div id="basic-datatables_filter" class="dataTables_filter">
                                                <label class="d-flex justify-content-end">Search:
                                                    <form>
                                                        
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
                                                        <th style="width: 35.875px;">Image</th>
                                                        <th style="width: 214.469px;">Name</th>
                                                        <th style="width: 214.469px;">Description</th>
                                                        <th style="width: 214.469px;">Long Des.</th>
                                                        <th style="width: 101.219px;">Category</th>
                                                        
                                                        <th style="width: 81.375px;">Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                @forelse($products as $product)
                                                    <tr role="row" class="odd" >
                                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <a href="">
                                                                <img class="tablepicture" src="{{ $product->picture ? asset('storage/'.$product->picture)  : asset('assets/admin/img/demoProfile.png') }}" alt="user profile picture">
                                                            </a>
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ substr($product->description,0,50) }}...</td>
                                                        <td>{{ substr($product->logn_description,0,50) }}...</td>
                                                        
                                                        <td>{{ $product->category->name }}</td>
                                                        
                                                        <td class="d-flex justify-content-center">
                                                            
                                                            <a href="{{ route('admin.product',['id'=> $product->id,'page'=>request()->query('page'),'search'=>request()->query('search')]) }}" class="btn btn-info p-1 me-1">
                                                                <i class="fas fa-edit iconsize"></i>
                                                            </a>

                                                            <form action="{{ route('admin.product.delete',['id'=>$product->id]) }}" method="post">
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
                                        <div class="col-12 d-flex justify-content-end me-2">
                                            @if ($products->previousPageUrl())
                                                <a href="{{ $products->previousPageUrl() }}"
                                                    class="btn btn-primary mx-2 p-1"><i class="fas fa-hand-point-left"></i></a>
                                            @endif

                                            @if ($products->nextPageUrl())
                                                <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary mx-2 p-1"><i
                                                        class="fas fa-hand-point-right "></i></a>
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

@endsection

@push('script')
<script>
    


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

   
    //handle product multiple image start hare........................................

    
    // const input = document.getElementById('productImages');
    // const previewContainer = document.querySelector('.productimages');
    // let imageFiles = [];

    // input.addEventListener('change', function (e) {
    //     const files = Array.from(e.target.files);
    //     files.forEach(file => {
    //         if (!file.type.startsWith('image/')) return;

    //         const reader = new FileReader();
    //         reader.onload = function (event) {
    //             const preview = document.createElement('div');
    //             preview.classList.add('preview-img');

    //             preview.innerHTML = `
    //                 <img src="${event.target.result}" alt="preview">
    //                 <button class="remove-btn">&times;</button>
    //             `;

    //             // Remove on click
    //             preview.querySelector('.remove-btn').addEventListener('click', function () {
    //                 const index = imageFiles.indexOf(file);
    //                 if (index > -1) {
    //                     imageFiles.splice(index, 1);
    //                 }
    //                 preview.remove();
    //             });

    //             previewContainer.appendChild(preview);
    //         };
    //         reader.readAsDataURL(file);

    //         imageFiles.push(file);
    //     });

    //     // Reset input to allow re-upload of same file
    //     input.value = '';
    // });

    


    //handle product multiple image end hare........................................


    // form submission .......................

    // document.getElementById('productForm').addEventListener('submit', function(e) {
    // e.preventDefault(); 
    // const form = e.target;
    // const formData = new FormData(form);

    // // adding file 
    // imageFiles.forEach(file => {
    //     formData.append('img[]', file);
    // });

    // fetch("", {
    //     method: 'POST',
    //     body: formData,
    // })
    // .then(res => res.json())
    // .then(data => {
        
    //     window.location.href = ""
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    // });
    // });



    
</script>

@endpush