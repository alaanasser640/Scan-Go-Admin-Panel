@extends('pages.admin-panel.layout')

@section('title')
    Edit Offer
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
                            <i class="icon-header bg-warning bx bxs-offer"></i>
                            <a class="text-muted fw-normal" href="{{ route('offers.index') }}">&nbsp;Offers /</a>
                            Edit Offer
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('offers.update', $offers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Offer ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="offer_id" value="{{ $offers->id }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <select class="" name="product_id" placeholder="Select Product" required>
                                {{-- <option selected="" disabled>Select Product</option> --}}
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == $offers->product_id ? 'selected' : '' }}>{{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Discount</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="number" class="form-control" name="value" value="{{ $offers->value }}"
                                    placeholder="Discount" required />
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="started_at"
                                    value="{{ $offers->started_at }}" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="ended_at" value="{{ $offers->ended_at }}"
                                    required />
                            </div>
                        </div>
                    </div>



                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
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

@section('script')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script> --}}

    <script>
        $(document).ready(function() {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>

    {{-- Select box contain search bar --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            //change selectboxes to selectize mode to be searchable
            $("select").select2();
        });
    </script> --}}
@endsection
