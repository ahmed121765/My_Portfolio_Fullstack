<div class="comment-respond">
    <h3 class="comment-reply-title">
        <span class="tj-comment__title">Leave a Comment</span>
    </h3>

    <form action="{{ route('comment.store.front') }}" method="POST" class="tj-post-comment__form">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="form_group">
                    <input placeholder="Enter Name" value="{{ old('user_name') }}" id="user_name" name="user_name"
                        type="text" class="@error('user_name') is-invalid @enderror" required />

                    @error('user_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form_group">
                    <input placeholder="Enter Email" value="{{ old('user_email') }}" id="user_email" name="user_email"
                        type="email" class="@error('user_email') is-invalid @enderror" required />

                    @error('user_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form_group">
                    <textarea class="msg-box @error('comment') is-invalid @enderror" placeholder="Enter Your Comments"
                        id="comment" name="comment" cols="45" rows="8" required>{{ old('comment') }}</textarea>

                    @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <button class="tj-btn-primary submit" type="submit">
            Post Comment
        </button>
    </form>


</div>