@extends('pages.admin-panel.layout')

@section('title')
    Delete Contact
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
    <!-- Form -->
    <div class="col-xxl">
        <div class="card mb-4">

            <div class="card-header d-flex align-items-center justify-content-between">

                <!-- Header -->
                <div class="d-flex flex-wrap justify-content-between flex-md-row flex-column">
                    <div>
                        <h4 class="fw-bold py-3 mb-4">
                            <i class="icon-header bg-warning bx bx-headphone"></i>
                            <a class="text-muted fw-normal" href="{{ route('contacts.index') }}">&nbsp;Contact /</a>
                            Delete Contact
                        </h4>
                    </div>
                </div>
                <!-- / Header -->

            </div>

            <div class="card-body">
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <div class="row mb-3 hidden">
                        <label class="col-sm-2 col-form-label">Contact ID </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="contact_id" value="{{ $contact->id }}"
                                    disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Cust. Name </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                @foreach ($customers as $customer)
                                    @if ($customer->id == $contact->customer_id)
                                        <input type="text" class="form-control" name="user_name"
                                            value="{{ $customer->user_name }}" disabled />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Cust. Email </label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                @foreach ($customers as $customer)
                                    @if ($customer->id == $contact->customer_id)
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $customer->email }}" disabled />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" name="date"
                                    value="{{ $contact->created_at->format('d/m/Y') }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email" class="form-control" name="time"
                                    value="{{ $contact->created_at->format('h:i') }}" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                @if ($contact->status == 1)
                                    <input type="email" class="form-control" name="status" value="Read" disabled />
                                @else
                                    <input type="email" class="form-control" name="status" value="Unread" disabled />
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <p class="form-control" style="background: #eceef1;">{{ $contact->message }}</p>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="{{ route('contacts.index') }}">Cancel</a>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--/ Form -->
@endsection
