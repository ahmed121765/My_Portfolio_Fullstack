@extends('admin.layouts.master')

@section('title', 'Comment Details')

@section('css')
    <style>
        /* ==========================================
           Comment Details - Dark Theme
        ========================================== */

        .comment-details {
            --cd-card: #202634;
            --cd-card-inner: #252d3d;
            --cd-border: rgba(255, 255, 255, .09);
            --cd-text: #e6eaf2;
            --cd-muted: #a4aec0;
            --cd-primary: #8b9aff;
            --cd-hover: #30394b;

            color: var(--cd-text);
        }

        /* Page Header */
        .comment-details .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .comment-details .page-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--cd-text) !important;
            margin-bottom: 6px;
        }

        .comment-details .page-subtitle {
            font-size: 14px;
            color: var(--cd-muted) !important;
            margin-bottom: 0;
        }

        /* Cards */
        .comment-details .details-card {
            background: var(--cd-card) !important;
            border: 1px solid var(--cd-border) !important;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .12);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .comment-details .card-heading {
            padding: 20px 25px;
            background: var(--cd-card) !important;
            border-bottom: 1px solid var(--cd-border) !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .comment-details .card-heading h5 {
            font-size: 16px;
            font-weight: 700;
            color: var(--cd-text) !important;
            margin: 0;
        }

        .comment-details .card-content {
            padding: 25px;
            background: var(--cd-card) !important;
        }

        /* User Avatar */
        .comment-details .user-avatar {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            background: rgba(117, 132, 255, .15) !important;
            color: var(--cd-primary) !important;
            border: 1px solid rgba(117, 132, 255, .15);
        }

        .comment-details .user-name {
            font-size: 17px;
            font-weight: 700;
            color: var(--cd-text) !important;
            margin-bottom: 5px;
            overflow-wrap: anywhere;
        }

        .comment-details .user-email {
            font-size: 13px;
            color: var(--cd-muted) !important;
            overflow-wrap: anywhere;
        }

        /* Details */
        .comment-details .detail-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--cd-border) !important;
        }

        .comment-details .detail-item:last-child {
            border-bottom: 0 !important;
            padding-bottom: 0;
        }

        .comment-details .detail-label {
            display: block;
            font-size: 13px;
            color: var(--cd-muted) !important;
            margin-bottom: 8px;
        }

        .comment-details .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--cd-text) !important;
            overflow-wrap: anywhere;
            margin: 0;
        }

        /* Comment Content */
        .comment-details .comment-content {
            background: var(--cd-card-inner) !important;
            border: 1px solid var(--cd-border) !important;
            border-radius: 10px;
            padding: 22px;
            color: var(--cd-text) !important;
            font-size: 15px;
            line-height: 1.9;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            min-height: 130px;
        }

        /* Status */
        .comment-details .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .comment-details .status-read {
            background: rgba(25, 135, 84, .18) !important;
            color: #6ee7a5 !important;
        }

        .comment-details .status-unread {
            background: rgba(255, 193, 7, .15) !important;
            color: #ffd666 !important;
        }

        /* Related Post */
        .comment-details .post-box {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 18px;
            background: var(--cd-card-inner) !important;
            border: 1px solid var(--cd-border) !important;
            border-radius: 10px;
        }

        .comment-details .post-icon {
            width: 45px;
            height: 45px;
            min-width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(117, 132, 255, .15) !important;
            color: var(--cd-primary) !important;
            border-radius: 10px;
            font-size: 18px;
        }

        .comment-details .post-title {
            font-weight: 700;
            color: var(--cd-text) !important;
            margin-bottom: 8px;
            overflow-wrap: anywhere;
        }

        /* Actions */
        .comment-details .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .comment-details .action-buttons .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 13px;
            font-weight: 600;
            transition: all .2s ease;
        }

        .comment-details .action-buttons .btn:hover {
            transform: translateY(-1px);
        }

        .comment-details .btn-light {
            background: var(--cd-card-inner) !important;
            border: 1px solid var(--cd-border) !important;
            color: var(--cd-text) !important;
        }

        .comment-details .btn-light:hover {
            background: var(--cd-hover) !important;
            color: #fff !important;
        }

        .comment-details .btn-primary {
            background: #596ce8;
            border-color: #596ce8;
            color: #fff;
        }

        .comment-details .btn-success {
            color: #fff;
        }

        .comment-details .btn-warning {
            color: #171717;
        }

        .comment-details .btn-danger {
            color: #fff;
        }

        /* Alerts */
        .comment-details .alert-success {
            background: rgba(25, 135, 84, .15);
            border: 1px solid rgba(25, 135, 84, .3);
            color: #8ce4b2;
        }

        .comment-details .alert-danger {
            background: rgba(220, 53, 69, .15);
            border: 1px solid rgba(220, 53, 69, .3);
            color: #ff9ba5;
        }

        .comment-details .close {
            color: inherit;
            text-shadow: none;
        }

        /* Icons */
        .comment-details .text-primary {
            color: var(--cd-primary) !important;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .comment-details .card-content {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .comment-details .page-title {
                font-size: 21px;
            }

            .comment-details .card-content,
            .comment-details .card-heading {
                padding: 17px;
            }

            .comment-details .page-header {
                align-items: flex-start;
            }

            .comment-details .page-header>a {
                width: 100%;
                text-align: center;
            }

            .comment-details .comment-content {
                padding: 15px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="comment-details">

        {{-- Alerts --}}
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

        {{-- Page Header --}}
        <div class="page-header">
            <div>
                <h4 class="page-title">Comment Details</h4>
                <p class="page-subtitle">
                    View and manage the details of this comment.
                </p>
            </div>

            <a href="{{ route('commentBackend.index') }}" class="btn btn-light border">
                <i class="fas fa-arrow-left mr-1"></i>
                Back to Comments
            </a>
        </div>

        <div class="row">

            {{-- Main Column --}}
            <div class="col-lg-8">

                {{-- Comment Content --}}
                <div class="details-card">

                    <div class="card-heading">
                        <h5>
                            <i class="far fa-comment-dots mr-2 text-primary"></i>
                            Comment Content
                        </h5>

                        @if ($comment->is_read)
                            <span class="status-badge status-read">
                                <i class="fas fa-check-circle"></i>
                                Read
                            </span>
                        @else
                            <span class="status-badge status-unread">
                                <i class="fas fa-envelope"></i>
                                Unread
                            </span>
                        @endif
                    </div>

                    <div class="card-content">

                        <div class="comment-content">{{ $comment->comment }}</div>

                        <div class="detail-item mt-3">
                            <span class="detail-label">Submitted At</span>

                            <p class="detail-value">
                                <i class="far fa-calendar-alt mr-2 text-primary"></i>

                                {{ $comment->created_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Last Updated</span>

                            <p class="detail-value">
                                <i class="far fa-clock mr-2 text-primary"></i>

                                {{ $comment->updated_at?->format('d M Y, h:i A') ?? 'N/A' }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Related Blog Post --}}
                <div class="details-card">

                    <div class="card-heading">
                        <h5>
                            <i class="fas fa-newspaper mr-2 text-primary"></i>
                            Related Blog Post
                        </h5>
                    </div>

                    <div class="card-content">

                        <div class="post-box">

                            <div class="post-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>

                            <div class="flex-grow-1">

                                <span class="detail-label">Post Title</span>

                                <p class="post-title">
                                    {{ $comment->post?->post_title ?? 'Deleted Post' }}
                                </p>

                                <span class="detail-label mb-0">
                                    Post ID: {{ $comment->post_id ?? 'N/A' }}
                                </span>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- User Information --}}
                <div class="details-card">

                    <div class="card-heading">
                        <h5>
                            <i class="fas fa-user mr-2 text-primary"></i>
                            User Information
                        </h5>
                    </div>

                    <div class="card-content">

                        <div class="d-flex align-items-center mb-3">

                            <div class="user-avatar mr-3">
                                <i class="fas fa-user"></i>
                            </div>

                            <div class="flex-grow-1">
                                <h6 class="user-name">
                                    {{ $comment->user_name ?: 'Unknown User' }}
                                </h6>

                                <div class="user-email">
                                    {{ $comment->user_email ?: 'No email provided' }}
                                </div>
                            </div>

                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Comment ID</span>

                            <p class="detail-value">
                                #{{ $comment->id }}
                            </p>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">User Name</span>

                            <p class="detail-value">
                                {{ $comment->user_name ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="detail-item">
                            <span class="detail-label">Email Address</span>

                            <p class="detail-value">
                                {{ $comment->user_email ?: 'N/A' }}
                            </p>
                        </div>

                    </div>
                </div>

                {{-- Comment Actions --}}
                <div class="details-card">

                    <div class="card-heading">
                        <h5>
                            <i class="fas fa-cog mr-2 text-primary"></i>
                            Actions
                        </h5>
                    </div>

                    <div class="card-content">

                        <div class="action-buttons">

                            {{-- Toggle Read Status --}}
                            <form action="{{ route('comments.toggle-read', $comment) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn {{ $comment->is_read ? 'btn-warning' : 'btn-success' }}">

                                    @if ($comment->is_read)
                                        <i class="fas fa-envelope"></i>
                                        Mark as Unread
                                    @else
                                        <i class="fas fa-envelope-open"></i>
                                        Mark as Read
                                    @endif

                                </button>
                            </form>

                            {{-- Delete Comment --}}
                            <form action="{{ route('commentBackend.destroy', $comment->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this comment? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete Comment
                                </button>
                            </form>

                            {{-- Back to List --}}
                            <a href="{{ route('commentBackend.index') }}" class="btn btn-light">
                                <i class="fas fa-list"></i>
                                All Comments
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.comment-details .alert-success').fadeOut('slow');
            }, 4000);
        });
    </script>
@endsection
