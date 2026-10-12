@extends('admin.layouts.master')

@section('title', 'My Education')

@section('css')
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- End plugin css for this page -->
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
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="" class="btn btn-inverse-warning" data-bs-toggle="modal" data-bs-target="#varyingModal">
                Add Education</a>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">My Quantity Services</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Institution</th>
                                    <th>From Year</th>
                                    <th>To Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educations as $education)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $education->resume_title }}</td>
                                        <td>{{ $education->institution }}</td>
                                        <td>{{ $education->from_year }}</td>
                                        <td>{{ $education->to_year }}</td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#EditeducationModal{{ $education->id }}"
                                                    class="btn btn-inverse-light">
                                                    Edit
                                                </a>

                                                <form action="{{ route('education.destroy', $education->id) }}" method="POST"
                                                    class="mb-0"
                                                    onsubmit="return confirm('Are you sure you want to delete this education?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>


                                    {{-- Edit Education Modal --}}
                                    <div class="modal fade" id="EditeducationModal{{ $education->id }}" tabindex="-1">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">
                                                        Edit Education
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body">

                                                    <form method="POST"
                                                        action="{{ route('education.update', $education->id) }}">

                                                        @csrf
                                                        @method('PUT')

                                                        <input type="hidden" name="resume_cat" value="education">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Title:
                                                            </label>

                                                            <input type="text" class="form-control" name="resume_title"
                                                                value="{{ old('resume_title', $education->resume_title) }}"
                                                                required>

                                                            @error('resume_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror

                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Organization:
                                                            </label>

                                                            <input type="text" class="form-control" name="institution"
                                                                value="{{ old('institution', $education->institution) }}"
                                                                required>

                                                            @error('institution')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                From Year:
                                                            </label>

                                                            <input type="text" class="form-control" name="from_year"
                                                                value="{{ old('from_year', $education->from_year) }}" required>

                                                            @error('from_year')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                To Year:
                                                            </label>

                                                            <input type="text" class="form-control" name="to_year"
                                                                value="{{ old('to_year', $education->to_year) }}" required>

                                                            @error('to_year')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>


                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>

                                                            <button type="submit" class="btn btn-primary">
                                                                Update Education
                                                            </button>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Education Model --}}
    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('education.store') }}">
                        @csrf
                        <input type="hidden" name="resume_cat" value="education">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" name="resume_title" placeholder="Lead Developer"
                                value="{{ old('resume_title') }}" required>
                            @error('resume_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization:</label>
                            <input type="text" class="form-control" name="institution" placeholder="Blockdots, London"
                                value="{{ old('institution') }}" required>
                            @error('institution')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="from" class="form-label">From Year:</label>
                            <input type="text" class="form-control" name="from_year" placeholder="2022" require
                                value="{{ old('from_year') }}" d>
                            @error('from_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="to" class="form-label">To Year:</label>
                            <input type="text" class="form-control" name="to_year" placeholder="Present" required
                                value="{{ old('to_year') }}">
                            @error('to_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Education</button>
                        </div>

                    </form>
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

    <script>
        $(document).on('click', '.editExp', function (e) {
            e.preventDefault();
            let id = $(this).attr('id');

            // Send edit exp ajax request
            $.ajax({
                url: 'edit-education/' + id,
                method: 'GET',
                dataType: 'json',
                success: function (result) {
                    $('#resume_title').val(result.resume_title);
                    $('#institution').val(result.institution);
                    $('#from_year').val(result.from_year);
                    $('#to_year').val(result.to_year);
                    $('#exp_id').val(result.id);
                }
            });

        });
    </script>
    <script>
        $('.editExp').click(function () {

            let id = $(this).attr('id');

            $('#exp_id').val(id);

            $('#editeducationForm').attr(
                'action',
                '/education/' + id
            );

        });
    </script>
@endsection