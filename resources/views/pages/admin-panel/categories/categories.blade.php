@extends('pages.admin-panel.layout')

@section('title')
    Categories
@endsection

@section('search_bar')
    <!-- Search -->
    <form action="{{ route('categories.index') }}" method="GET" accept-charset="UTF-8" role="search" style="width:380%;">
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

    <div class="card p-4">
        <div>

            <!-- Page header -->
            <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                <div>
                    <h4 class="fw-bold py-3 mb-4">
                        <i class="icon-header bg-warning bx bx-category"></i> &nbsp; Categories
                    </h4>
                </div>
                <div class="py-3 mb-4">
                    <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Category
                    </a>
                </div>
            </div>
            <!-- / Page header -->


            <div class="table-responsive text-nowrap">
                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th> ID </th>
                            <th> Image </th>
                            <th> Name </th>
                            <th> No. of Products Type </th>
                            <th> location </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 0; ?>
                        <tr>
                            @foreach ($categories as $category)
                                <th scope="row"> {{ $id += 1 }} </th>
                                
                                <td>
                                    <img src="images/{{ $category->image }}" class="img-category" alt="image" />
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->num_of_types }}</td>
                                <td>{{ $category->location }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                        data-bs-original-title="Edit">
                                        <i class="bx bxs-edit-alt text-info"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('categories.show', $category->id) }}" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                        data-bs-original-title="Delete">
                                        <i class="bx bx-trash text-danger"></i>
                                    </a>
                                </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <!--/ Table -->
            </div>
        </div>
    </div>

@endsection
