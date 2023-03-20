@extends('pages.admin-panel.layout')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

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
                <i class="mdi mdi-border-all"></i>
            </span> Categories
        </h3>
        <button class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="mdi mdi-plus"></i>&nbsp;&nbsp;Add Category
        </button>
    </div>

    <!-- categories table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="search-field d-md-block">
                    <form class="d-flex align-items-center h-100" action="{{route('searchCategory')}}" method="post">
                    @csrf    
                    <div class="input-group" style="border-radius:20px">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Category..." name="name">
                            <div class="input-group-prepend bg-transparent">
                                <button type="submit" class="input-group-text border-0 mdi mdi-magnify"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Image </th>
                            <th> Name </th>
                            <th> Number of Products Type </th>
                            <th> location </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $id = 0 ?>
                    

                    @foreach($categories as $category)
                    
                    <tr>
                        <td> {{{$id+=1}}}</td>
                        <td class="py-1">
                                <img src="images/{{$category->image}}" alt="image" />
                            </td>
                        <td> {{{$category->name}}} </td>
                        <td> {{{$category->num_of_types}}} </td>
                        <td> {{{$category->location}}} </td>
                        <td>
                            <a href="#" onclick="edit_category(this)" data-category_id="{{$category->id}}" class="mdi mdi-border-color cursor-pointer action-icon text-primary edit_category"
                                data-bs-toggle="modal" data-bs-target="#editModal" ></a>

                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#" onclick="delete_category(this)" data-deleted_category_id="{{$category->id}}" class="mdi mdi-delete cursor-pointer action-icon text-danger delete_category"
                                data-bs-toggle="modal" data-bs-target="#deletetModal" ></a>
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
                    <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{route('addCategory')}}" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg" name="name"
                                id="exampleInputCategoryName" placeholder="Category Name">
                        </div>
                    </div>
                    <div class="form-group">
                            <input type="file" class="file-upload-default" name="image" id="category_image">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Category Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 16px 30px;font-size:14px;">Upload</button>
                            </span>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="number" class="form-control form-control-lg"
                                id="exampleInputQuantity" placeholder="Number Of Types" name="num_of_types">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputLocation" placeholder="Location" name="location">
                        </div>
                    </div>

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
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>


                <form action="{{route('updateCategory')}}" method="POST" id="editcategoryForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                <div class="form-group">
                        <div class="col mb-3">
                            <input type="hidden" class="form-control form-control-lg"
                                id="category_id" name="category_id" placeholder="id">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg"
                                id="name" name="name" placeholder="Category Name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="file" class="file-upload-default" name="image" id="category_image">
                        <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Category Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 16px 30px;font-size:14px;">Upload</button>
                        </span>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="num_of_types" placeholder="Number Of Types" name="num_of_types">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="location" placeholder="Location" name="location">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-gradient-primary" id="saveBtn" >Save changes</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deletetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{route('destroyCategory')}}" method="POST" id="deletecategoryForm">
                @csrf
                @method('DELETE')
                    <div class="modal-body">
                        <p>Sure that, you want to delete this category?</p>
                    
                        <div class="form-group">
                            <div class="col mb-3">
                                <input type="hidden" class="form-control form-control-lg"
                                    id="deleted_category_id" name="deleted_category_id" placeholder="id">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="delete_btn" class="btn btn-gradient-primary">Delete</button>
                    </div>
            </form>

            </div>
        </div>
    </div>

    
@endsection

@section('script')


    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    --}}

    <script type="text/javascript">
        $(document).ready(function(){
            //var table = $('#datatable').DataTable();

            //display Edit Modal
            $('.edit_category').on('click', function(){
                
                //var category_id = $(this).parent().prev().prev().prev().prev().text();
                var name = $(this).parent().prev().prev().prev().text();
                var num_of_types = $(this).parent().prev().prev().text();
                var location = $(this).parent().prev().text();
                
                    $('#name').val(name);
                    $('#num_of_types').val(num_of_types);
                    $('#location').val(location);
                    $('#editModal').modal('show');
            }),

            $('.delete_category').on('click', function(){
            
                $('#deleteModal').modal('show');
            })
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script> // get category id
        function edit_category(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#editModal") //your modal
            var category_id = link.data('category_id')
            modal.find('#category_id').val(category_id);}
    </script>

    <script> // get category id
        function delete_category(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#deletetModal") //your modal
            var deleted_category_id = link.data('deleted_category_id')
            modal.find('#deleted_category_id').val(deleted_category_id);}
    </script>

@endsection