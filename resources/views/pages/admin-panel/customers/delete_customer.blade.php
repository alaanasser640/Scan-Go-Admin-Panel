@extends('pages.admin-panel.layout')

@section('title')
    Delete Customer
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search-disabled d-flex align-items-center" style="width:400%;">
        <i class="bx bx-search fs-4 lh-0"></i> 
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." disabled/>
    </div>
    <!-- /Search -->
@endsection

@section('content')
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bxs-group"></i>
                            <a class="text-muted fw-normal" href="{{ url('/customers') }}">&nbsp;Customers /</a>
                            Delete Customer
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

            @csrf
                                @method('POST')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Username </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{$customer->user_name}}" disabled />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" value="IMG-123456" disabled />
                            </div>
                        </div>
                    </div> -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{$customer->phone_number}}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{$customer->email}}" disabled />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Credit Card</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Credit Card" disabled />
                            </div>
                        </div>
                    </div> -->

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        
                      
                                <input type="hidden" value="$customer->id">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ url('/customers') }}">Cancel</a>
                       
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
