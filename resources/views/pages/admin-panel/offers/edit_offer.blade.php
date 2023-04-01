@extends('pages.admin-panel.layout')

@section('title')
    Edit Offer
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
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bxs-offer"></i>
                            <a class="text-muted fw-normal" href="{{ url('/offers') }}">&nbsp;Offers /</a>
                            Edit Offer
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="" method="">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Product Name</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="">
                                <option selected="" disabled>Select Product</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>


                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Discount</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="number" class="form-control" placeholder="Discount" required />
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" placeholder="Phone" required />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" placeholder="Email" required />
                            </div>
                        </div>
                    </div>



                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
