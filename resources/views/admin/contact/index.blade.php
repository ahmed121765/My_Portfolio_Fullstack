@extends('admin.layouts.master')

@section('title')
    All Contacts
@endsection

@section('css')

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
                    <h6 class="card-title">All Cantacts </h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client's Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Service Needed</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> {{ Str::title($contact->first_name) }} {{ Str::title($contact->last_name) }} </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ Str::title($contact->service->service_title) }}</td>
                                        <td>{!! Str::wordWrap($contact->description, 20, '<br />') !!}</td>
                                        <td>
                                            {{-- Delete --}}
                                            <form action="{{ route('contact.admin.destroy', $contact->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
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

@endsection