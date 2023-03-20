@extends('pages.admin-panel.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

    <!-- page header -->
    <div class="page-header flex-column flex-md-row">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-package-variant-closed"></i>
            </span> Products
        </h3>
        <button class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="mdi mdi-plus"></i>&nbsp;&nbsp;Add Product
        </button>
    </div>


    <!-- products table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="search-field d-md-block">
                    <form class="d-flex align-items-center h-100" action="{{route('searchProduct')}}" method="post">
                    @csrf    
                    <div class="input-group">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Product..." name="product">
                            <div class="input-group-prepend bg-transparent">
                                <button type="submit" class="input-group-text border-0 mdi mdi-magnify"></button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Image </th>
                            <th> Name </th>
                            <th> Categories </th>
                            <th> Company </th>
                            <th> Quantity </th>
                            <th> Code </th>
                            <th> Price </th>
                            <th> Sold Units </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $id = 0 ?>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$id+=1}}</td>
                            <td class="py-1">
                                <img src="images/{{$product->image}}" alt="image" />
                            </td>
                            <td> {{$product->name}} </td>
                            <td> {{$product->category->name}} </td>
                            <td> {{$product->producer}} </td>
                            <td> {{$product->stock}} </td>
                            <td> {{$product->code}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->sold_units}} </td>
                            <td>
                                <a href="#" onclick="edit_product(this)" data-product_id="{{$product->id}}" class="mdi mdi-border-color cursor-pointer action-icon text-primary edit_product"
                                    data-bs-toggle="modal" data-bs-target="#editProduct"></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" onclick="delete_product(this)" data-deleted_product_id="{{$product->id}}" class="mdi mdi-delete cursor-pointer action-icon text-danger delete_product"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{route('addProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    id="exampleInputProductName" placeholder="Product Name" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" class="file-upload-default" name="image" id="image">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Product Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 16px 30px;font-size:14px;">Upload</button>
                            </span>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col mb-3">
                                <input type="file" class="form-control form-control-lg"
                                    id="exampleInputProductName" placeholder="Product Image" name="image">
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col mb-0">
                                <select class="form-control form-select form-control-lg"
                                    id="exampleInputCategories" name='category_id'>
                                    <option >Select Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    id="exampleInputProductName" placeholder="Product Company" name="producer">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="number" class="form-control form-control-lg"
                                    id="exampleInputQuantity" placeholder="Quantity" name="stock">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="number" class="form-control form-control-lg"
                                    id="exampleInputCode" placeholder="Code" name="code">
                            </div>
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" class="form-control" id="exampleInputPrice"
                                placeholder="Price" name="price">
                        </div>

                        <!-- <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="text" class="form-control" id="start_date"
                                    placeholder="Start Date" onfocus="(this.type='date')" name="start_date"/>
                            </div>

                            <div class="mb-3 col-md-6">
                                <input type="text" class="form-control" id="end_date" placeholder="End Date"
                                    onfocus="(this.type='date')" name="end_date" />
                            </div>
                        </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-gradient-primary">Save changes</button>
            </div>
        </form>
            </div>
                
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('updateProduct')}}" method="post" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="modal-body">

                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="hidden" class="form-control form-control-lg"
                                id="product_id" name="product_id" placeholder="id">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Product Name" name="name" id="name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="file" class="file-upload-default" name="image" id="image">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Product Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 16px 30px;font-size:14px;">Upload</button>
                        </span>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="col mb-3">
                            <input type="file" class="form-control form-control-lg"
                                placeholder="Product Image" name="image" id="image">
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <div class="col mb-0">
                            <select class="form-control form-select form-control-lg"
                                name='category_id' id="category_id">
                                <option >Select Categories</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Product Company" name="producer" id="producer">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Quantity" name="stock" id="stock">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Code" name="code" id="code">
                        </div>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" 
                            placeholder="Price" name="price" id="price">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-gradient-primary">Save changes</button>
                </div>
            </div>
                </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deletetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('destroyProduct')}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Sure that, you want to delete this product?</p>
                    <div class="form-group">
                            <div class="col mb-3">
                                <input type="hidden" class="form-control form-control-lg"
                                    id="deleted_product_id" name="deleted_product_id" placeholder="id">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-gradient-primary">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){

            $('.edit_product').on('click', function(){
                
            
               // var image = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().text();
                var name = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
                var category_id =$(this).parent().prev().prev().prev().prev().prev().prev().text();
                var company =$(this).parent().prev().prev().prev().prev().prev().text();
                var quantity =$(this).parent().prev().prev().prev().prev().text();
                var code =$(this).parent().prev().prev().prev().text();
                var price =$(this).parent().prev().prev().text();
                
                
                  //  $('#image').val(image);
                    $('#name').val(name);
                    $('#category_id').val(category_id);
                    $('#producer').val(company);
                    $('#stock').val(quantity);
                    $('#code').val(code);
                    $('#price').val(price);
                    $('#editProduct').modal('show');
            }),

            $('.delete_product').on('click', function(){
            
                $('#deleteModal').modal('show');
            })
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function edit_product(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#editProduct") //your modal
            var product_id = link.data('product_id')
            modal.find('#product_id').val(product_id);
        
        }
    </script>

    <script>
    function delete_product(el) {
        var link = $(el) //refer `a` tag which is clicked
        var modal = $("#deletetModal") //your modal

        var deleted_product_id = link.data('deleted_product_id')
        modal.find('#deleted_product_id').val(deleted_product_id);
        
    }
    </script>
@endsection