<?php use App\Http\Controllers\NotificationController; ?>

@extends('pages.admin-panel.layout')

@section('title')
    Notifications
@endsection

@section('search_bar')
    <!-- Search -->
    <form action="{{ route('notifications.index') }}" method="GET" accept-charset="UTF-8" role="search" style="width:80%;">
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
    <!-- Page header -->
    <div>
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profile') }}">
                    <i class="bx bx-user" style="margin: -3px 0px 0px -3px;"></i>&nbsp;&nbsp;Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('notifications.index') }}">
                    <i class="bx bx-bell" style="margin: -3px 0px 0px -3px;"></i>
                    &nbsp;&nbsp;Notifications&nbsp;
                    @if (Auth::user()->unreadNotifications->count() > 0)
                        ( {{ Auth::user()->unreadNotifications->count() }} )
                    @endif
                </a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="{{url('/purchase')}}">
                <i class="mdi mdi-cart-plus me-2"></i> Purchase
            </a>
        </li> --}}
        </ul>
    </div>
    <!-- / Page header -->


    <!-- Table -->
    <div class="card px-4 pb-4">
        <!-- Table header -->
        <div class="justify-content-between align-items-center py-3 d-flex">
            <div class="justify-content-sm-start">
                <span class="badge bg-label-success fs-6" style="text-transform: capitalize;">Addition Process</span>
                <span class="badge bg-label-info ms-2 fs-6" style="text-transform: capitalize;">Updation Process</span>
                <span class="badge bg-label-danger ms-2 fs-6" style="text-transform: capitalize;">Deletion Process</span>
                <span class="badge bg-label-warning ms-2 fs-6" style="text-transform: capitalize;">Sign Up / In</span>
                <span class="badge bg-label-dark ms-2 fs-6" style="text-transform: capitalize;">Log Out</span>
            </div>
            <div class="justify-content-sm-end d-flex">
                <a class="btn btn-outline-info table-btn note" href="{{ url('read_all_notification') }}">
                    <span class="tf-icons bx bxs-check-circle" style="margin: -3px 0px 0px -3px;"></span>&nbsp;&nbsp;Mark
                    all as read
                </a>
                <form action="{{ url('delete_all_notification') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger table-btn ms-3 note">
                        <span class="tf-icons bx bx-trash" style="margin: -3px 0px 0px -3px;"></span>&nbsp;&nbsp;Delete all
                    </button>
                </form>
            </div>
        </div>
        <!-- /Table header -->

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th> ID </th>
                        <th> Admin Email </th>
                        <th> Description </th>
                        <th> Type </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 0; ?>
                    @foreach (Auth::user()->notifications as $notification)
                        @if ($notification->read_at == null)
                            <tr class="bg-light-gray">
                            @else
                            <tr class="bg-white">
                        @endif

                        <th scope="row">{{ $id += 1 }}</th>

                        <td>
                            <input type="hidden" name="admin_id" value="{{ $notification->data['admin_id'] }}">
                            {{ $notification->data['admin_email'] }}
                        </td>

                        <td>
                            {{ $notification->data['desc'] }}
                            <span class="text-gray fw-bold">( {{ $notification->data['item_name'] }} )</span>
                        </td>

                        {{-- <td class={{ $notification->type == 'App\Notifications\CreateCategory' ? "bg-secondary" : "" }} {{ $notification->type == 'App\Notifications\UpdateCategory' ? "bg-primary" : ""}}>  --}}

                        @if (
                            $notification->type == 'App\Notifications\CreateCategory' ||
                                $notification->type == 'App\Notifications\CreateProduct' ||
                                $notification->type == 'App\Notifications\CreateOffer' ||
                                $notification->type == 'App\Notifications\CreateAdmin')
                            <td class="bg-label-success" onclick=" window.location='{{ route('categories.index') }}';"
                                style="cursor: pointer;">
                                <span> Add </span>
                            @elseif (
                                $notification->type == 'App\Notifications\UpdateCategory' ||
                                    $notification->type == 'App\Notifications\UpdateProduct' ||
                                    $notification->type == 'App\Notifications\UpdateOffer' ||
                                    $notification->type == 'App\Notifications\UpdateAdmin' ||
                                    $notification->type == 'App\Notifications\UpdateContact')
                            <td class="bg-label-info">
                                <span> Update </span>

                            @elseif (
                                $notification->type == 'App\Notifications\DestroyCategory' ||
                                    $notification->type == 'App\Notifications\DestroyProduct' ||
                                    $notification->type == 'App\Notifications\DestroyOffer' ||
                                    $notification->type == 'App\Notifications\DestroyCustomer' ||
                                    $notification->type == 'App\Notifications\DestroyAdmin' ||
                                    $notification->type == 'App\Notifications\DestroyContact')
                            <td class="bg-label-danger">
                                <span> Delete </span>

                            @elseif ($notification->type == 'App\Notifications\LogoutAdmin')
                            <td class="bg-label-dark">
                                <span> Log Out </span>

                            @elseif ($notification->type == 'App\Notifications\RegisterAdmin' || $notification->type == 'App\Notifications\LoginAdmin')
                            <td class="bg-label-warning">
                                <span> Sign Up / In </span>
                        @endif
                        </td>


                        <td> {{ $notification->created_at->format('d/m/Y') }} </td>
                        <td> {{ $notification->created_at->format('h:i') }} </td>

                        <td>
                            {{-- href="{{ NotificationController::mark_all_as_read(); }}" --}}
                            <a href="{{ url('read_notification') }}/{{ $notification->data['id'] }}"
                                data-id="{{ $notification->id }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                data-bs-placement="bottom" data-bs-html="true" data-bs-original-title="Mark as read"
                                style="pointer-events: {{ $notification->read_at == null ? 'auto' : 'none' }};">
                                @if ($notification->read_at == null)
                                    <i class="bx bxs-check-circle text-info"></i>
                                @else
                                    <i class="bx bxs-check-circle text-dark"></i>
                                @endif
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="notification_id" value="{{ $notification->id }}">
                                <button type="submit" style="border: none; background: none;" data-bs-toggle="tooltip"
                                    data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                                    data-bs-original-title="Delete">
                                    <i class="bx bx-trash text-danger"></i>
                                </button>
                            </form>
                        </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!--/ Table -->
@endsection

@section('script')
@endsection
