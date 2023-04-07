@extends('pages.admin-panel.layout')

@section('title')
    Products
@endsection

@section('search_bar')
    <!-- Search -->
    <form action="{{ route('products.index') }}" method="GET" accept-charset="UTF-8" role="search" style="width:80%;">
        <div class="table-search d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none" name="search" value="{{ request('search') }}"
                placeholder="Search..." aria-label="Search..." />
        </div>
    </form>
    <!-- /Search -->
@endsection

@section('content')
    {{-- Validation errors alert --}}
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

    {{-- Error message alert  --}}
    @if (session()->has('error_message'))
        <div class="alert alert-danger alert-dismissible">
            {{ session()->get('error_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Message alert --}}
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
                        <i class="icon-header bg-warning bx bx-package"></i> &nbsp; Products
                    </h4>
                </div>
                <div class="py-3 mb-4">
                    <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Product
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
                            <th> Name </th>
                            <th> Category </th>
                            <th> Producer </th>
                            <th> Stock </th>
                            <th> Code </th>
                            <th> Price </th>
                            <th> Sold Units </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 0; ?>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row"> {{ $id += 1 }} </th>
                                <td>
                                    <img src="images/{{ $product->image }}" class="img-product" alt="image" />
                                </td>
                                <td> {{ $product->name }} </td>
                                <td> {{ $product->category->name }} </td>
                                <td> {{ $product->producer }} </td>
                                <td> {{ $product->stock }} </td>
                                <td> {{ $product->code }} </td>
                                <td>
                                    @if ($product->value > 0)
                                        {{-- <del> {{ $product->price }} L.E </del> --}}
                                        {{ $product->price * ($product->value / 100) }} L.E
                                        <span class="badge bg-label-dark ms-2">{{ $product->value }}% off</span>
                                    @else
                                        {{ $product->price }} L.E
                                    @endif
                                </td>
                                <td> ----- </td> {{-- sold units --}}
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                        data-bs-original-title="Edit">
                                        <i class="bx bxs-edit-alt text-info"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="{{ route('products.show', $product->id) }}" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                        data-bs-original-title="Delete">
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
