@extends('pages.admin-panel.layout')

@section('title')
    Add New Admin
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search-disabled d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i> 
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." disabled/>
    </div>
    <!-- /Search -->
@endsection

@section('content')
<!-- Validation errors alert -->
@if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error message alert -->
    @if (session()->has('error_message'))
        <div class="alert alert-danger alert-dismissible">
            {{ session()->get('error_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Message alert -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bxs-group"></i>
                            <a class="text-muted fw-normal" href="{{ route('admins.index') }}">&nbsp;Admins /</a>
                            Add New Admin
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Username </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" name="user_name" class="form-control" placeholder="Username" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" class="form-control" required name="image" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="tel" class="form-control" name="phone_number" placeholder="Phone" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="email" placeholder="Email" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 form-password-toggle">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="password" id="pass_input" name="password" class="form-control" placeholder="*******" required />
                                <span class="input-group-text cursor-pointer" ><i class="bx bx-hide" id="pass_icon"></i></span>
                            </div>
                        </div>
                    </div>
                    


                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a type="button" class="btn btn-secondary" href="{{ url('/admins') }}">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
