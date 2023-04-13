@extends('pages.admin-panel.layout')

@section('title')
    Admins
@endsection

@section('search_bar')
    <!-- Search -->
    <form action="{{ route('admins.index') }}" method="GET" accept-charset="UTF-8" role="search" style="width:80%;">
        <div class="table-search d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" name="search" value="{{ request('search') }}"
                placeholder="Search..." aria-label="Search..." />
        </div>
    </form>
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
    <!-- Table -->
    <div class="card p-4">
        <div>

            <!-- Page header -->
            <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                <div>
                    <h4 class="fw-bold py-3 mb-4">
                        <i class="icon-header bg-warning bx bxs-group"></i> &nbsp; Admins
                    </h4>
                </div>
                <div class="py-3 mb-4">
                    <a href="{{ route('admins.create') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Admin
                    </a>
                </div>
            </div>
            <!-- / Page header -->



            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th> ID </th>
                            <th> Image </th>
                            <th>Username </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th> Last Login </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $id = 0; ?>
                        <tr>
                        @foreach ($admins as $admin)
                            <th scope="row">{{{$id+=1}}}</th>
                            <td>
                                <img src="images/{{$admin->image}}" class="img-category" alt="image" />
                            </td>
                            <td>{{{$admin->user_name}}}</td>
                            <td>{{{$admin->phone}}}</td>
                            <td>{{{$admin->email}}}</td>
                            <td>{{{$admin->updated_at}}}</td>
                            <td>
                                <a href="{{ route('admins.edit', $admin->id) }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Edit">
                                    <i class="bx bxs-edit-alt text-info"></i>
                                </a>
                                &nbsp;&nbsp;
                                <a href="{{ route('admins.show', $admin->id) }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Table -->
@endsection
