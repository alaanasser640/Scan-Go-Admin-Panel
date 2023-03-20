@extends('pages.admin-panel.layout')

@section('content')

    <!-- page header -->
    <div class="page-header">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/profile')}}">
                    <i class="mdi mdi-account me-2"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/notification')}}">
                    <i class="mdi mdi-bell me-2"></i> Notifications
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active bg-gradient-primary" href="{{url('/purchase')}}">
                    <i class="mdi mdi-cart-plus me-2"></i> Purchase
                </a>
            </li>
        </ul>
    </div>

    <!-- purchase table -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <input type="text" class="form-control bg-transparent border-2"
                                placeholder="Search Purchase...">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th> Image </th>
                            <th> email </th>
                            <th> Cart ID </th>
                            <th> Receipt Number </th>
                            <th> Date </th>
                            <th> Time </th>
                            
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td class="py-1">
                                <img src="../../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td> customer@email.com </td>
                            <td> 5 </td>
                            <td> 00017 </td>
                            <td> May 15, 2015 </td>
                            <td> 10:00 PM </td>
                        </tr>

                        <tr>
                            <td class="py-1">
                                <img src="../../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td> customer@email.com </td>
                            <td> 5 </td>
                            <td> 00018 </td>
                            <td> May 15, 2015 </td>
                            <td> 10:00 PM </td>
                        </tr>

                        <tr>
                            <td class="py-1">
                                <img src="../../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td> customer@email.com </td>
                            <td> 5 </td>
                            <td> 00019 </td>
                            <td> May 15, 2015 </td>
                            <td> 10:00 PM </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection