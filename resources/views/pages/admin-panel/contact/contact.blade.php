@extends('pages.admin-panel.layout')

@section('title')
    Contact
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
                        <i class="icon-header bg-warning bx bx-headphone"></i> &nbsp; Contact
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
                            <th> Cust. Name </th>
                            <th> Cust. Email </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Status </th>
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
                            <td><span class="badge bg-label-info me-1">Read</span></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/delete_contact') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
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
                            <td><span class="badge bg-label-danger me-1">Unread</span></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/delete_contact') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
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
                            <td><span class="badge bg-label-info me-1">Read</span></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/delete_contact') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
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
                            <td><span class="badge bg-label-danger me-1">Unread</span></td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#viewModal">
                                    <i class="bx bx-show-alt text-secondary fs-4"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/delete_contact') }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Preview Contact Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <p>email@gmail.com</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <p>Here will appear the content of the message...
                                Here will appear the content of the message...
                                Here will appear the content of the message...
                                Here will appear the content of the message...
                                Here will appear the content of the message...
                                Here will appear the content of the message...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Read</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Preview Modal -->
@endsection
