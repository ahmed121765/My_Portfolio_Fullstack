 @extends('admin.layouts.master')

@section('title')
All Posts
@endsection

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
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Posts </h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Photo</th>
                                        <th>Author</th>
                                        <th>Post Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{ $post->photo?asset('blogs/'.$post->photo):asset('backend/assets/images/no_image.jpg') }}" alt=""> </td>
                                            <td>{{ Illuminate\Support\Str::title($post->author->name) }}</td>
                                            <td>{{ Illuminate\Support\Str::limit($post->post_title, 70) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('blog.edit', [$post->id]) }}" class="btn btn-inverse-light"
                                                        style="margin-right: 10px;">Edit</a>
                                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="mb-0"
                                                        onsubmit="return confirm('Are you sure you want to delete this post?')">
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