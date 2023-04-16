@extends('pages.admin-panel.layout')

@section('title')
    Customers
@endsection

@section('search_bar')

    <!-- Search -->
    <form action="" method="GET" accept-charset="UTF-8" role="search" style="width:80%;">
        <div class="table-search d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" name="search" value="{{ request('search') }}"
                placeholder="Search..." aria-label="Search..." />
        </div>
    </form>
    <!-- /Search -->

@endsection

@section('content')
    @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    
    <!-- Table -->
    <div class="card p-4">
        <div>

            <!-- Page header -->
            <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                <div>
                    <h4 class="fw-bold py-3 mb-4">
                        <i class="icon-header bg-warning bx bxs-group"></i> &nbsp; Customers
                    </h4>
                </div>
                {{-- <div class="py-3 mb-4">
                    <a href="{{ url('/add_customer') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Customer
                    </a>
                </div> --}}
            </div>
            <!-- / Page header -->


            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th> ID </th>
                            <th> Image </th>
                            <th> Username </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $id = 0; ?>
                        <tr>
                        @foreach ($customers as $customer)
                            <th scope="row">{{{$id+=1}}}</th>
                            @if($customer->image == "")
                            <td>
                            <img src="images/sara.jpg" class="img-category" alt="image" />
                            </td>
                            @endif
                            @if($customer->image != "")
                            <td>
                            <img src="images/{{$customer->image}}" class="rounded-circle img-user" alt="image" />
                            </td>
                            @endif
                            <td>{{$customer->user_name}}</td>
                            <td>{{$customer->phone_number}}</td>
                            <td>{{$customer->email}}</td>


                            <td>
                                {{-- <a href="{{ url('/edit_customer') }}" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Edit">
                                <i class="bx bxs-edit-alt text-info"></i>
                            </a>
                            &nbsp;&nbsp; --}}
                                <a href="{{ url('/delete_customer', $customer->id) }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach

                       


                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Table -->
@endsection
