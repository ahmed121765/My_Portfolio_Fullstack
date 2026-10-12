@extends('admin.layouts.master')

@section('title')

@endsection

@section('css')

@endsection

@section('content')
    @php
    $profile = auth('admin')->user();
    @endphp
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="position-relative">
                    <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                        <img src="{{ asset('banners/' . $profile->banner) }}
                              " class="rounded-top" alt="profile cover" style="width: 100%; height: 200px">
                    </figure>
                    <div
                        class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                        <div>
                            <img class="wd-70 rounded-circle" src="{{ asset('avatars/' . $profile->avatar) }}"
                                alt="profile">
                            <span class="h4 ms-3 text-light">{{ $profile->name }}</span>
                        </div>
                        <div class="d-none d-md-block">
                            <a href="{{ route('profile.index') }}" class="btn btn-primary btn-icon-text">
                                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                    <ul class="d-flex align-items-center m-0 p-0">
                        <li class="d-flex align-items-center active">
                            <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                            <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
                        </li>
                        <li class="ms-3 ps-3 border-start d-flex align-items-center">
                            <i class="me-1 icon-md" data-feather="user"></i>
                            <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
                        </li>
                        <li class="ms-3 ps-3 border-start d-flex align-items-center">
                            <i class="me-1 icon-md" data-feather="users"></i>
                            <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span
                                    class="text-muted tx-12">3,765</span></a>
                        </li>
                        <li class="ms-3 ps-3 border-start d-flex align-items-center">
                            <i class="me-1 icon-md" data-feather="image"></i>
                            <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
                        </li>
                        <li class="ms-3 ps-3 border-start d-flex align-items-center">
                            <i class="me-1 icon-md" data-feather="video"></i>
                            <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection