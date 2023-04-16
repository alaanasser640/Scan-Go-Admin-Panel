@extends('pages.admin-panel.layout')

@section('title')
    Delete Receipt
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
                            <i class="icon-header bg-warning bx bx-receipt"></i>
                            <a class="text-muted fw-normal" href="{{ url('/receipts') }}">&nbsp;Receipts /</a>
                            Show Receipt
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="" 
                    enctype="multipart/form-data">
                   
                   

                    <!-- <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Receipt ID</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="receipt_id" value="{{ $receipt->id }}"
                                    disabled />
                            </div>
                        </div>
                    </div> -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Receipt No.</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $receipt->receipt_number }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Cust. Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $receipt->email }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Quantity</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $receipt->total_quantity }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $receipt->total_price }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $receipt->date }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="{{ $receipt->time }}" disabled />
                            </div>
                        </div>
                    </div>

                    @if($receipt->sent_by_email == 1)
                    
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sent By Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Sent" disabled />
                            </div>
                        </div>
                    </div>
                    
                    @endif
                    @if($receipt->sent_by_email == 0)
                    
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sent By Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" value="Not Sent" disabled />
                            </div>
                        </div>
                    </div>
                   
                    @endif

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Preview</label>
                        <div class="col-sm-10 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Product Name </th>
                                        <th> Product Price </th>
                                        <th> Quantity </th>
                                        <th> Total Price </th>
                                    </tr>
                                </thead>
                                <tbody>


                               
                                @foreach($purchases as $p)
                                 
                                    <tr>
                                        <td>{{$p->name}}</td>
                                        <td> {{$p->price}}</td>
                                        <td>{{$p->quantity}}</td>
                                        <td> {{$p->total_price}} </td>
                                    </tr>
                                @endforeach
                                

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <!-- <button type="submit" class="btn btn-danger">OK</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                            <a class="btn btn-secondary" href="{{ url('/receipts') }}">OK</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
