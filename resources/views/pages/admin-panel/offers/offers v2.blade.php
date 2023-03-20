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

@if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
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
        <i class="mdi mdi-percent"></i>
        </span> Offers
        </h3>  
        <button class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#addModal" style="margin-left: 65%;">
            <i class="mdi mdi-plus"></i>&nbsp;&nbsp;Add Offer
        </button>
        {{-- <form action="{{route('expired')}}" method="POST">
            @csrf
            <button class="btn btn-gradient-primary">
                <i class="mdi mdi-refresh"></i>
            </button>
        </form> --}}
    </div>

    <!-- offers table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="search-field d-md-block">
                    <form class="d-flex align-items-center h-100" action="{{route('searchOffer')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Offer..." name="offer">
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
                            <th> Product </th>
                            <th> Discount </th>
                            <th> Start Date </th>
                            <th> End Date </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $id = 0 ?>
                        @foreach($offers as $offer)
                        <tr>
                            <td> {{$id+=1}} </td>
                            <td> {{$offer->name }} </td>
                            <td> {{$offer->value}} </td>
                            <td> {{date('d-m-Y', strtotime($offer->started_at))}} </td>
                            <td> {{date('d-m-Y', strtotime($offer->ended_at))}} </td>
                            <td>
                                <a href="#" onclick="edit_offer(this)" data-offer_id="{{$offer->id}}" class="mdi mdi-border-color cursor-pointer action-icon text-primary edit_offer"
                                    data-bs-toggle="modal" data-bs-target="#editModal"></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="#" onclick="delete_offer(this)" data-deleted_offer_id="{{$offer->id}}" class="mdi mdi-delete cursor-pointer action-icon text-danger delete_offer"
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
                    <h5 class="modal-title" id="exampleModalLabel1">Add Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                
                <form action="{{route('addOffer')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <div class="col mb-0">
                                <select class="form-control form-select form-control-lg"
                                    id="product_id" name='product_id'>
                                    <option >Select Product</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group input-group">
                            <input type="number" class="form-control" id="value" placeholder="Discount" name="value">
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
    

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="date" class="form-control form-control-lg"
                                    id="started_at" placeholder="Start Date" name="started_at">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="date" class="form-control form-control-lg"
                                    id="ended_at" placeholder="End Date" name="ended_at">
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
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{route('updateOffer')}}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                @csrf

                    <div class="modal-body">
                        
                        <div class="form-group">
                            <div class="col mb-3">
                                <input type="text" class="form-control form-control-lg"
                                    id="offer_id" name="offer_id" placeholder="id">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="text" class="form-control form-control-lg"
                                    id="edit_product_id" name="edit_product_id" placeholder="Product ID">
                            
                                {{-- <select class="form-control form-select form-control-lg"
                                    id="edit_product_id" name="edit_product_id"> 
                                    <option>Select Products</option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control" 
                            id="edit_value" placeholder="Discount" name="edit_value">
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="text" class="form-control form-control-lg"
                                    id="edit_started_at" placeholder="Start Date" name="edit_started_at">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col mb-0">
                                <input type="text" class="form-control form-control-lg"
                                    id="edit_ended_at" placeholder="End Date" name="edit_ended_at">
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

    <!-- Delete Modal -->
    <div class="modal fade" id="deletetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{route('destroyOffer')}}" method="POST">
                    @csrf
                    @method('DELETE')
                
                    <div class="modal-body">
                        <p>Sure that, you want to delete this offer?</p>
                        <div class="form-group">
                                <div class="col mb-3">
                                    <input type="hidden" class="form-control form-control-lg"
                                        id="deleted_offer_id" name="deleted_offer_id" placeholder="id">
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

            $('.edit_offer').on('click', function(){
                
                var product_id = $(this).parent().prev().prev().prev().prev().text();
                var value =$(this).parent().prev().prev().prev().text();
                var started_at =$(this).parent().prev().prev().text();
                var ended_at =$(this).parent().prev().text();
                
                $('#edit_product_id').val(product_id);
                $('#edit_value').val(value);
                $('#edit_started_at').val(started_at);
                $('#edit_ended_at').val(ended_at);
                $('#editModal').modal('show');
            }),

            $('.delete_offer').on('click', function(){
                $('#deleteModal').modal('show');
            })
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function edit_offer(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#editModal") //your modal
            var offer_id = link.data('offer_id')
            modal.find('#offer_id').val(offer_id);
        }
    </script>

    <!--delete offer-->
    <script>
        function delete_offer(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#deletetModal") //your modal

            var deleted_offer_id = link.data('deleted_offer_id')
            modal.find('#deleted_offer_id').val(deleted_offer_id);
            
        }
    </script>

@endsection