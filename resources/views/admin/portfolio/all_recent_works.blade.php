@extends('admin.layouts.master')

@section('title', 'All Recent Works')

@section('css')
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
        <!-- End plugin css for this page -->
        <style>
            .service-description {
                max-width: 400px;
                white-space: wrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .action-buttons-wrapper {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
        gap: 10px;
    }

    .action-buttons-wrapper form {
        display: inline-flex !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .action-buttons-wrapper .btn {
        white-space: nowrap;
        display: inline-block;
    }
        </style>
@endsection


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">My Recent Works</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Serial No:</th>
                                    <th>Photo</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Sub-Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($works as $key => $work)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> <img
                                                src="{{ $work->photo ? asset($work->photo) : asset('backend/assets/images/no_image.jpg') }}"
                                                alt="Works"> </td>
                                        <td>{{ Illuminate\Support\Str::title(optional($work->service)->service_title ?? 'No Category') }}</td>
                                        <td>{{ Illuminate\Support\Str::title($work->title) }}</td>
                                        <td>{!! Illuminate\Support\Str::wordWrap($work->sub_title, 30, '<br>') !!}</td>
                                        <td class="action-buttons">
                                            <div class="action-buttons-wrapper">

                                                <a href="{{ route('portfolio.edit_work', $work->id) }}" class="btn btn-inverse-light">
                                                    Edit
                                                </a>

                                                <form action="{{ route('portfolio.delete_work', $work->id) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this work?')">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/data-table.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->
@endsection