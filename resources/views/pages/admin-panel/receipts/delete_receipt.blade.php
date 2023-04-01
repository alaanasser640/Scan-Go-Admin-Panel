@extends('pages.admin-panel.layout')

@section('title')
    Delete Receipt
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
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
                            <i class="icon-header bg-warning bx bx-receipt"></i>
                            <a class="text-muted fw-normal" href="{{ url('/receipts') }}">&nbsp;Receipts /</a>
                            Delete Receipt
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="" method="">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Receipt No.</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Receipt No." disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Cust. Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" value="Cust. Email" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Quantity</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Total Quantity" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Total Price" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Date" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Time" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sent By Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Sent By Email" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10 table-responsive">
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

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
