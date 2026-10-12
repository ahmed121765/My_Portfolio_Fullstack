@extends('admin.layouts.master')

@section('title')
    Site Setting
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

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Update Site Settings </h6>

                <form class="forms-sample" method="POST" action="{{ route('setting.update', $sData->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" value="{{ $sData->phone }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{ $sData->email }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Address </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $sData->address }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Footer Notes </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="footer_note" value="{{ $sData->footer_note }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Logo</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="logo" type="file" id="Image">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img id="ShowImage"
                                src="{{ $sData->logo ? asset('logos/' . $sData->logo) : asset('backend/assets/images/no_image.jpg') }}"
                                alt="Logo" style="width: 90px; height: 90px">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary">Updated</button>
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