@extends('pages.admin-panel.layout')

@section('title')
    Notifications
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
    <!-- Page header -->
    <div class="">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}">
                    <i class="bx bx-user" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/notification') }}">
                    <i class="bx bx-bell" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Notifications
                </a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="{{url('/purchase')}}">
                <i class="mdi mdi-cart-plus me-2"></i> Purchase
            </a>
        </li> --}}
        </ul>
    </div>
    <!-- / Page header -->


    <!-- Table -->
    <div class="card p-4">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th> ID </th>
                        <th> Image </th>
                        <th> Admin Name </th>
                        <th> Description </th>
                        <th> Date </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('assets/images/avatars/5.png') }}" alt="image" />
                        </td>
                        <td> Sara </td>
                        <td> This is the description of anything done by the others admins in the admin panel. </td>
                        <td> May 03, 2015 </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!--/ Table -->
@endsection
