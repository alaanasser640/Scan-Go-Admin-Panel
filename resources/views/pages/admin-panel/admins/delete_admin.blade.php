@extends('pages.admin-panel.layout')

@section('title')
    Delete Admin
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
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bxs-group"></i>
                            <a class="text-muted fw-normal" href="{{ url('/admins') }}">&nbsp;Admins /</a>
                            Delete Admin
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Admin ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="admin_id" value="{{ $admin->id }}"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Username </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $admin->user_name }}"  disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $admin->image }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="tel" class="form-control" value="{{ $admin->phone_number }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" value="{{ $admin->email }}" disabled />
                            </div>
                        </div>
                    </div>


                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
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
