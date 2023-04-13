@extends('pages.admin-panel.layout')

@section('title')
    Contact
@endsection

@section('search_bar')
    <!-- Search -->
    <form action="" method="GET" accept-charset="UTF-8" role="search" style="width:80%;">
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
                        <i class="icon-header bg-warning bx bx-headphone"></i> &nbsp; Contact
                    </h4>
                </div>
                {{-- <div class="py-3 mb-4">
                    <a href="{{ route('contacts.create') }}" type="button" class="btn btn-primary">
                        <i class="bx bx-plus"></i> &nbsp; Add New Contact
                    </a>
                </div> --}}
            </div>
            <!-- / Page header -->


            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th> ID </th>
                            <th> Cust. Name </th>
                            <th> Cust. Email </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Status </th>
                            <th> Preview </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 0; ?>
                        @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $id += 1 }}</th>
                                <td>{{ $contact->user_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                <td>{{ $contact->created_at->format('h:i') }}</td>
                                <td>
                                    @if ($contact->status == 1)
                                        <span class="badge bg-label-info me-1">Read</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Unread</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" onclick="view_msg(this)" data-contact_id="{{ $contact->id }}"
                                        data-email="{{ $contact->email }}" data-status="{{ $contact->status }}"
                                        data-msg="{{ $contact->message }}" data-bs-toggle="modal"
                                        data-bs-target="#viewModal">
                                        <i class="bx bx-show-alt text-secondary fs-4"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('contacts.show', $contact->id) }}" data-bs-toggle="tooltip"
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


    <!-- Preview Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Contact Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="row mb-3 hidden">
                            <label class="col-sm-2 col-form-label">Contact ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact_id" name="contact_id">
                            </div>
                        </div>

                        <div class="row mb-3 hidden">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status" name="status">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 email-p">
                                {{-- <input type="text" class="form-control border-0 bg-white" id="email" name="email" disabled> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10 msg-p">
                                {{-- <textarea type="text" class="form-control border-0 bg-white overflow-hidden" id="msg" name="msg" disabled></textarea> --}}
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        {{-- (condition)? [value if true] : [value if false]; --}}
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" {{ $contact->status == 1 ? '' : 'hidden' }}>Mark as read</button> --}}
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /Preview Modal -->
@endsection

@section('script')
    <script>
        function view_msg(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#viewModal") //refer `#id` of modal
            var contact_id = link.data('contact_id')
            var email = link.data('email')
            var msg = link.data('msg')
            var status = link.data('status')
            modal.find('#contact_id').val(contact_id);
            modal.find('#email').val(email);
            modal.find('#msg').val(msg);
            modal.find('#status').val(status);

            $(".email-p").html('<p>' + email + '</p>');
            $(".msg-p").html('<p>' + msg + '</p>');

            if (document.getElementById("status").value == 0) {
                $(".modal-footer").html(
                    '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>' +
                    '<button type="submit" class="btn btn-primary" id="read_btn">Mark as read</button>'
                );
            } else {
                $(".modal-footer").html(
                    '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>'
                )
            }

            modal.modal('show');
        }
    </script>
@endsection
