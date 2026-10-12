@extends('admin.layouts.master')

@section('title', 'Hero Section')

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
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Hero Section</h6>
                <form method="POST" action="{{ route('hero.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label"></label>
                                <img id="ShowImage"
                                    src="{{ $hero->photo ? asset('heros/' . $hero->photo) : asset('backend/assets/images/no-img-avatar.png') }}"
                                    alt="Hero Photo"
                                    style="width: 140px; height: 140px; border-radius: 10px; object-fit: cover;">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Choose Hero Photo</label>
                                <input class="form-control" name="photo" type="file" id="Image">
                                @error('photo')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name', $hero->name) }}">
                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Profession</label>
                                <input type="text" class="form-control" name="profession"
                                    value="{{ old('profession', $hero->profession) }}">
                                @error('profession')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Twitter URL</label>
                                <input type="text" class="form-control" name="twitter_url"
                                    value="{{old('twitter_url', $hero->twitter_url) }}">
                                @error('twitter_url')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">Youtube URL</label>
                                <input type="text" class="form-control" name="youtube_url"
                                    value="{{old('youtube_url', $hero->youtube_url) }}">
                                @error('youtube_url')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">LinkIn URL</label>
                                <input type="text" class="form-control" name="linkin_url"
                                    value="{{old('linkin_url', $hero->linkin_url) }}">
                                @error('linkin_url')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label class="form-label">GitHub URL</label>
                                <input type="text" class="form-control" name="github_url"
                                    value="{{ old('github_url', $hero->github_url) }}">
                                @error('github_url')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Years Of Experience</label>
                                <input type="text" class="form-control" name="YOE" value="{{ old('YOE', $hero->YOE)}}">
                                @error('YOE')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Project Completed</label>
                                <input type="text" class="form-control" name="PC" value="{{ old('PC', $hero->PC) }}">
                                @error('PC')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Happy Clients </label>
                                <input type="text" class="form-control" name="HC" value="{{ old('HC', $hero->HC) }}">
                                @error('HC')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Col -->

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Upload Your Resume (CV)</label>

                                <input class="form-control" name="resume" type="file">

                                @error('resume')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Col -->

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_description"
                                    rows="3">{{ old('short_description', $hero->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary submit">Update Hero Section</button>
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