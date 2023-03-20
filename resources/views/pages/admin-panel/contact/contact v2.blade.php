@extends('pages.admin-panel.layout')

@section('content')
    
<!-- page header -->
<div class="page-header flex-column flex-md-row">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-headset"></i>
        </span> Contact
    </h3>
</div>


<!-- contact table -->
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="search-field d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <input type="text" class="form-control bg-transparent border-2"
                            placeholder="Search Contact...">
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
                        <th> Cust. Name </th>
                        <th> Cust. Email </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Status </th>
                        <th> Preview </th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>1</td>
                        <td> Customer name </td>
                        <td> Customer@gmail.com </td>
                        <td> oct 15, 2022 </td>
                        <td> 9:00 PM </td>
                        <td><label class="badge badge-primary">Read</label></td>
                        <td>
                            <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                data-bs-target="#viewModal"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td> Customer name </td>
                        <td> Customer@gmail.com </td>
                        <td> oct 15, 2022 </td>
                        <td> 9:00 PM </td>
                        <td><label class="badge badge-danger">Unread</label></td>
                        <td>
                            <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                data-bs-target="#viewModal"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td> Customer name </td>
                        <td> Customer@gmail.com </td>
                        <td> oct 15, 2022 </td>
                        <td> 9:00 PM </td>
                        <td><label class="badge badge-primary">Read</label></td>
                        <td>
                            <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                data-bs-target="#viewModal"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td> Customer name </td>
                        <td> Customer@gmail.com </td>
                        <td> oct 15, 2022 </td>
                        <td> 9:00 PM </td>
                        <td><label class="badge badge-danger">Unread</label></td>
                        <td>
                            <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                data-bs-target="#viewModal"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td> Customer name </td>
                        <td> Customer@gmail.com </td>
                        <td> oct 15, 2022 </td>
                        <td> 9:00 PM </td>
                        <td><label class="badge badge-danger">Unread</label></td>
                        <td>
                            <i class="mdi mdi-eye cursor-pointer action-icon" data-bs-toggle="modal"
                                data-bs-target="#viewModal"></i>
                        </td>
                    </tr>


                </tbody>
            </table>
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
                <p>Her will appear the content of the message...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-gradient-primary">Read</button>
            </div>
        </div>
    </div>
</div>

@endsection
