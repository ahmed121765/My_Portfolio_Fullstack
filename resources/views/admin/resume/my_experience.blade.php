@extends('admin.layouts.master')

@section('title', 'My Experience')

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
                Add Experience</a>
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
                                @foreach ($experiences as $experience)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $experience->resume_title }}</td>
                                        <td>{{ $experience->institution }}</td>
                                        <td>{{ $experience->from_year }}</td>
                                        <td>{{ $experience->to_year }}</td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">

                                                <a href="#" data-bs-toggle="modal" data-bs-target="#EditExperienceModal{{ $experience->id }}"
                                                    class="btn btn-inverse-light">
                                                    Edit
                                                </a>

                                                <form action="{{ route('experience.destroy', $experience->id) }}" method="POST" class="mb-0"
                                                    onsubmit="return confirm('Are you sure you want to delete this experience?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>


                                    {{-- Edit Experience Modal --}}
                                    <div class="modal fade" id="EditExperienceModal{{ $experience->id }}" tabindex="-1">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h5 class="modal-title">
                                                        Edit Experience
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('experience.update', $experience->id) }}">

                                                        @csrf
                                                        @method('PUT')

                                                        <input type="hidden" name="resume_cat" value="experience">

                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Title:
                                                            </label>

                                                            <input type="text" class="form-control" name="resume_title"
                                                                value="{{ old('resume_title', $experience->resume_title) }}" required>

                                                                @error('resume_title')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror

                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                Organization:
                                                            </label>

                                                            <input type="text" class="form-control" name="institution"
                                                                value="{{ old('institution', $experience->institution) }}" required>

                                                                @error('institution')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                From Year:
                                                            </label>

                                                            <input type="text" class="form-control" name="from_year"
                                                                value="{{ old('from_year', $experience->from_year) }}" required>

                                                                @error('from_year')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>


                                                        <div class="mb-3">

                                                            <label class="form-label">
                                                                To Year:
                                                            </label>

                                                            <input type="text" class="form-control" name="to_year"
                                                                value="{{ old('to_year', $experience->to_year) }}" required>

                                                                @error('to_year')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                        </div>


                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                Close
                                                            </button>

                                                            <button type="submit" class="btn btn-primary">
                                                                Update Experience
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

    {{-- Add Experience Model --}}
    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('experience.store') }}">
                        @csrf
                        <input type="hidden" name="resume_cat" value="experience">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" name="resume_title" placeholder="Lead Developer" value="{{ old('resume_title') }}"
                                required>
                                @error('resume_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization:</label>
                            <input type="text" class="form-control" name="institution" placeholder="Blockdots, London" value="{{ old('institution') }}"
                                required>
                                @error('institution')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="from" class="form-label">From Year:</label>
                            <input type="text" class="form-control" name="from_year" placeholder="2022" require value="{{ old('from_year') }}"d>
                            @error('from_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="to" class="form-label">To Year:</label>
                            <input type="text" class="form-control" name="to_year" placeholder="Present" required value="{{ old('to_year') }}">
                            @error('to_year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Experience</button>
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
                url: 'edit-experience/' + id,
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

                $('#editExperienceForm').attr(
                    'action',
                    '/experience/' + id
                );

            });
    </script>
@endsection