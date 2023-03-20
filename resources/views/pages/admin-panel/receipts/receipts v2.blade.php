@extends('pages.admin-panel.layout')

@section('content')

    <!-- page header -->
    <div class="page-header flex-column flex-md-row">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-receipt"></i>
            </span> Receipts
        </h3>
    </div>

    <!-- receipts table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="search-field d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Receipt...">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Cart ID </th>
                            <th> Receipt No. </th>
                            <th> Cust. Email </th>
                            <th> Cust. Credit Card </th>
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
                            <td>1</td>
                            <td> 3 </td>
                            <td> 00123 </td>
                            <td>custom@gmail.com</td>
                            <td>3012125632021245</td>
                            <td> 15 </td>
                            <td>$ 782.5</td>
                            <td> Oct 8, 2022 </td>
                            <td> 10:00 PM </td>
                            <td>
                                <button class="btn btn-info"> Send </button>
                            </td>
                            <td>
                                <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                    data-bs-target="#viewModal"></i>
                            </td>
                            <td>
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td> 1 </td>
                            <td> 2 </td>
                            <td> 00124 </td>
                            <td>custom@gmail.com</td>
                            <td>3012125632021245</td>
                            <td> 15 </td>
                            <td>$ 782.5</td>
                            <td> Oct 8, 2022 </td>
                            <td> 10:00 PM </td>
                            <td> Done </td>
                            <td>
                                <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                    data-bs-target="#viewModal"></i>
                            </td>
                            <td>
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td> 2 </td>
                            <td> 1 </td>
                            <td> 00125 </td>
                            <td>custom@gmail.com</td>
                            <td>3012125632021245</td>
                            <td> 15 </td>
                            <td>$ 782.5</td>
                            <td> Oct 8, 2022 </td>
                            <td> 10:00 PM </td>
                            <td>
                                <button class="btn btn-info"> Send </button>
                            </td>
                            <td>
                                <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                    data-bs-target="#viewModal"></i>
                            </td>
                            <td>
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td> 3 </td>
                            <td> 5 </td>
                            <td> 00126 </td>
                            <td>custom@gmail.com</td>
                            <td>3012125632021245</td>
                            <td> 15 </td>
                            <td>$ 782.5</td>
                            <td> Oct 8, 2022 </td>
                            <td> 10:00 PM </td>
                            <td> Done </td>
                            <td>
                                <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                    data-bs-target="#viewModal"></i>
                            </td>
                            <td>
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Delete Modal -->
    <div class="modal fade" id="deletetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sure that, you want to delete this receipt?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-gradient-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Preview Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Her will appear the content of the receipt...</p>
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-gradient-primary"
                        data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection