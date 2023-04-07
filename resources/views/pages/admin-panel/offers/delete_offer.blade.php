@extends('pages.admin-panel.layout')

@section('title')
    Delete Offer
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
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bxs-offer"></i>
                            <a class="text-muted fw-normal" href="{{ route('offers.index') }}">&nbsp;Offers /</a>
                            Delete Offer
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('offers.destroy', $offers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Offer ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="offer_id" value="{{ $offers->id }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                @foreach ($products as $product)
                                    @if ($offers->product_id == $product->id)
                                        <input type="text" class="form-control" name="product_id"
                                            value="<?php echo $product->name; ?>" disabled />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Discount</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="value" value="{{ $offers->value }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="started_at"
                                    value="{{ date('d/m/Y', strtotime($offers->started_at)) }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="ended_at"
                                    value="{{ date('d/m/Y', strtotime($offers->ended_at)) }}" disabled />
                            </div>
                        </div>
                    </div>

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ route('offers.index') }}">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
