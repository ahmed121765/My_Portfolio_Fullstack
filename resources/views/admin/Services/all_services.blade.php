@extends('admin.layouts.master')

@section('title', 'All Services')

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
    </style>
@endsection

@section('title_page1')

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
                    <h6 class="card-title">My Quantity Services</h6>
                    <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Serial No:</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$service->service_title}}</td>
                                        <td>
                                            <div class="service-description">
                                                {{ $service->service_description }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-secondary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                    class="mb-0"
                                                    onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
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