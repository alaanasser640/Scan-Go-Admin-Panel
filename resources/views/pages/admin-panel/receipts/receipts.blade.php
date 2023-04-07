@extends('pages.admin-panel.layout')

@section('title')
    Receipts
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
    <!-- Table -->
    <div class="card p-4">
        <div>

            <!-- Page header -->
            <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                <div>
                    <h4 class="fw-bold py-3 mb-4">
                        <i class="icon-header bg-warning bx bx-receipt"></i> &nbsp; Receipts
                    </h4>
                </div>
                {{-- <div class="py-3 mb-4">
                    <a href="{{ url('/add_receipt') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Receipt
                    </a>
                </div> --}}
            </div>
            <!-- / Page header -->


            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th> ID </th>
                            <th> Receipt No. </th>
                            <th> Cust. Email </th>
                            <th> Total Quantity </th>
                            <th> Total Price </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Sent By Email </th>
                            <th> Preview </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td><button class="btn btn-secondary" disabled> Done </button></td>
                            <td style="text-align-last: center;">
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <a href="{{ url('/edit_receipt') }}">
                                <i class="bx bxs-edit-alt text-info"></i>
                            </a>
                            &nbsp;&nbsp; --}}
                                <a href="{{ url('/delete_receipt') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </a>

                            </td>
                        </tr>

                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td><button class="btn btn-info"> Send </button></td>
                            <td style="text-align-last: center;">
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <a href="{{ url('/edit_receipt') }}">
                                <i class="bx bxs-edit-alt text-info"></i>
                            </a>
                            &nbsp;&nbsp; --}}
                                <a href="{{ url('/delete_receipt') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </a>

                            </td>
                        </tr>

                        <tr>
                            <th scope="row">1</th>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td><button class="btn btn-info"> Send </button></td>
                            <td style="text-align-last: center;">
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                {{-- <a href="{{ url('/edit_receipt') }}">
                                <i class="bx bxs-edit-alt text-info"></i>
                            </a>
                            &nbsp;&nbsp; --}}
                                <a href="{{ url('/delete_receipt') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </a>

                            </td>
                        </tr>




                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Table -->

    <!-- Preview Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Preview Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Product Name </th>
                                            <th> Product Price </th>
                                            <th> Quantity </th>
                                            <th> Total Price </th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td>Cake</td>
                                            <td> $ 12 </td>
                                            <td>3</td>
                                            <td> $ 36 </td>
                                        </tr>

                                        <tr>
                                            <td>Cake</td>
                                            <td> $ 12 </td>
                                            <td>3</td>
                                            <td> $ 36 </td>
                                        </tr>

                                        <tr>
                                            <td>Cake</td>
                                            <td> $ 12 </td>
                                            <td>3</td>
                                            <td> $ 36 </td>
                                        </tr>

                                        <tr>
                                            <td>Cake</td>
                                            <td> $ 12 </td>
                                            <td>3</td>
                                            <td> $ 26 </td>
                                        </tr>

                                        <tr>
                                            <td>Cake</td>
                                            <td> $ 12 </td>
                                            <td>3</td>
                                            <td> $ 26 </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Preview Modal -->
@endsection
