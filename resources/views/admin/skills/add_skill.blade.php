@extends('admin.layouts.master')

@section('title', 'Add Skill')


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

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Skill </h6>

                    <form class="forms-sample" method="POST" action="{{ route('store.skill') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Technology Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="technology_name" value="{{ old('technology_name') }}"
                                    placeholder="JavaScript">

                                @error('technology_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Experience Level </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ old('exp_level') }}" name="exp_level" placeholder="70%">
                                @error('exp_level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Icon</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="icon" type="file" value="{{ old('icon') }}" id="Image" required>
                                @error('icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <img id="ShowImage" src="{{ asset('backend/assets/images/no_image.jpg') }}" alt=""
                                    style="width: 90px; height: 90px">
                                    @error('ShowImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Add Skill</button>
                    </form>

                </div>
            </div>
        </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#Image').on('change', function (e) {
                var reader = new window.FileReader();
                reader.onload = function (e) {
                    $('#ShowImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>
@endsection