@extends('admin.layouts.master')

@section('title', 'Edit Skill')

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

                    <h6 class="card-title">Edit Skill </h6>

                    <form class="forms-sample" method="POST" action="{{ route('update.skill', $skill->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $skill->id }}">
                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Technology Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="technology_name"
                                    value="{{ old('technology_name', $skill->technology_name) }}">

                                @error('technology_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Experience Level </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="exp_level" value="{{ $skill->exp_level }}">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Icon</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="icon" type="file" id="Image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <img id="ShowImage" src="{{ $skill->icon ? asset('skills/' . $skill->icon) : asset('backend/assets/images/no_image.jpg')  }}" alt="" style="width: 90px; height: 90px">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Update Skill</button>
                    </form>

                </div>
            </div>
        </div>
@endsection

@section('scripts')

@endsection