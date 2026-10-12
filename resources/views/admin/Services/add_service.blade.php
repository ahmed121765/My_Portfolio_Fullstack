@extends('admin.layouts.master')

@section('title', 'Add Service')

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

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add a Service </h6>

                    <form class="forms-sample" method="POST" action="{{ route('services.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Title:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_title" placeholder="Service Title">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Description:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="service_description" rows="3"
                                    placeholder="Service Description"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Add Service</button>
                    </form>

                </div>
            </div>
        </div>


@endsection