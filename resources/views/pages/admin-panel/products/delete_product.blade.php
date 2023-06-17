@extends('pages.admin-panel.layout')

@section('title')
    Delete Product
@endsection

@section('search_bar')
    <!-- Search -->
    <div class="table-search-disabled d-flex align-items-center" style="width:400%;">
        <i class="bx bx-search fs-4 lh-0"></i>
        <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..."
            disabled />
    </div>
    <!-- /Search -->
@endsection

@section('content')

    @foreach ($offers as $offer)
        @if ($offer->product_id == $product->id)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <h6 class="alert-heading fw-bold">Warning!</h6>
                <p class="mb-0">This product has <span class="fw-bold">(<?php echo $offer->value; ?>%)</span> offer. If you delete this product, all related offers will also be deleted.</p>
            </div>
        @endif
    @endforeach

    

    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bx-package"></i>
                            <a class="text-muted fw-normal" href="{{ route('products.index') }}">&nbsp;Products /</a>
                            Delete Product
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Product ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="hidden_id" value="{{ $product->id }}"
                                    placeholder="Product ID" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="image" value="{{ $product->image }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $product->category->name }}"
                                    name="categoty_id" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Producer</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="producer" value="{{ $product->producer }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="stock" value="{{ $product->stock }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="code" value="{{ $product->code }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
