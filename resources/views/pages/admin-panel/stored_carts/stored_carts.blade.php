@extends('pages.admin-panel.layout')

@section('content')

    <!-- page header -->
    <div class="page-header flex-column flex-md-row">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cart"></i>
            </span> Stored Carts
        </h3>
        <button class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="mdi mdi-plus"></i>&nbsp;&nbsp;Add Shopping Cart
        </button>
    </div>

    <!-- carts table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Shopping Cart...">
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
                            <th> QR Code </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>1</td>
                            <td> huikg00112200 </td>
                            <td> Debug </td>
                            <td>
                                <i class="mdi mdi-border-color cursor-pointer action-icon text-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td> 00113311jhlhu </td>
                            <td> In Progrss </td>
                            <td>
                                <i class="mdi mdi-border-color cursor-pointer action-icon text-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td> 0011jklohu4488 </td>
                            <td> Stopped </td>
                            <td>
                                <i class="mdi mdi-border-color cursor-pointer action-icon text-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td> 0011joihu7878 </td>
                            <td> In progress </td>
                            <td>
                                <i class="mdi mdi-border-color cursor-pointer action-icon text-primary"
                                    data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="mdi mdi-delete cursor-pointer action-icon text-danger"
                                    data-bs-toggle="modal" data-bs-target="#deletetModal"></i>
                            </td>
                        </tr>


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
                    <h5 class="modal-title" id="exampleModalLabel1">Add Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputCartName" placeholder="Shopping Cart Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputQRCode" placeholder="QR Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputCustID" placeholder="Cust. ID">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="date" class="form-control form-control-lg"
                                id="exampleInputDate" placeholder="Date">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col mb-3">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputCartName" placeholder="Shopping Cart Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputQRCode" placeholder="QR Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="text" class="form-control form-control-lg"
                                id="exampleInputCustID" placeholder="Cust. ID">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col mb-0">
                            <input type="date" class="form-control form-control-lg"
                                id="exampleInputDate" placeholder="Date">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deletetModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Delete Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sure that, you want to delete this shopping cart?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-gradient-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>

@endsection