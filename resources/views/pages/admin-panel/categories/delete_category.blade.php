@extends('pages.admin-panel.layout')

@section('title')
    Delete Category
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search-disabled d-flex align-items-center">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."
            disabled />
    </div>
    <!-- /Search -->
@endsection

@section('content')
    @if ($category->products->count() > 0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h6 class="alert-heading fw-bold">Warning!</h6>
            <p class="mb-0">This category contains <span class="fw-bold">(<?php echo $category->products->count(); ?>)</span> products. If you
                delete this category, all related products will also be deleted.</p>
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
                            <i class="icon-header bg-warning bx bx-category"></i>
                            <a class="text-muted fw-normal" href="{{ route('categories.index') }}">&nbsp;Categories /</a>
                            Delete Category
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Category ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="category_id" value="{{ $category->id }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="image" value="{{ $category->image }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No. of types</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="num_of_types"
                                    value="{{ $category->num_of_types }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="location" value="{{ $category->location }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
