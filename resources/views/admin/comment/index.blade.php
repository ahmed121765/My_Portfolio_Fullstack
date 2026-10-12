@extends('admin.layouts.master')

@section('title', 'All Comment')

@section('css')
    <style>
        .comment-actions {
            display: flex !important;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 8px;
            min-width: 190px;
        }

        .comment-actions form {
            display: inline-flex !important;
            margin: 0 !important;
        }

        .comment-action-btn {
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            gap: 6px;
            min-width: 42px;
            min-height: 38px;
            padding: 7px 10px !important;
            border: 1px solid;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.4;
            text-decoration: none !important;
            cursor: pointer;
            opacity: 1 !important;
            visibility: visible !important;
            transition: background-color .2s ease, transform .2s ease;
        }

        .comment-action-btn svg {
            width: 18px;
            height: 18px;
            display: block !important;
            flex-shrink: 0;
        }

        .comment-action-btn:hover {
            transform: translateY(-2px);
            filter: brightness(1.15);
        }

        .comment-status-active {
            background: #14532d !important;
            color: #bbf7d0 !important;
            border-color: #22c55e !important;
        }

        .comment-status-inactive {
            background: #374151 !important;
            color: #f3f4f6 !important;
            border-color: #9ca3af !important;
        }

        .comment-read-btn {
            background: #164e63 !important;
            color: #cffafe !important;
            border-color: #06b6d4 !important;
        }

        .comment-unread-btn {
            background: #713f12 !important;
            color: #fef3c7 !important;
            border-color: #f59e0b !important;
        }

        .comment-actions .comment-action-btn span {
            display: inline !important;
            color: inherit !important;
        }

        .comment-actions button:focus {
            outline: 2px solid #60a5fa;
            outline-offset: 2px;
        }
    </style>
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
    {{-- Stat Cards --}}
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-inbox"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Messages</h4>
                    </div>
                    <div class="card-body">
                        {{ $stats['total'] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Unread</h4>
                    </div>
                    <div class="card-body">
                        {{ $stats['unread'] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Read</h4>
                    </div>
                    <div class="card-body">
                        {{ $stats['read'] }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Today</h4>
                    </div>
                    <div class="card-body">
                        {{ $stats['today'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- Filters & Search --}}
    <div class="card">
        <div class="card-body">
            <form method="GET" action="{{ route('commentBackend.index') }}">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-2 mb-md-0">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by name, email, phone, message..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 mb-md-0">
                        <select name="status" class="form-control selectric">
                            <option value="">All Statuses</option>
                            <option value="unread" @selected(request('status') === 'unread')>Unread Only</option>
                            <option value="read" @selected(request('status') === 'read')>Read Only</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-md-right">
                        <button type="submit" class="btn btn-primary mr-1">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                        <a href="{{ route('commentBackend.index') }}" class="btn btn-secondary">
                            <i class="fas fa-redo mr-1"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th>Serial No:</th>
                    <th>Post Title</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $key => $comment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {!! Illuminate\Support\Str::wordWrap($comment->post?->post_title ?? 'Deleted Post', 20, '<br />') !!}
                        </td>
                        <td>{{ $comment->user_name }}</td>
                        <td>{{ $comment->user_email }}</td>
                        <td>{!! Illuminate\Support\Str::wordWrap($comment->comment, 40, '<br />') !!}</td>

                        <td>
                            <div class="comment-actions">

                                {{-- Activate / Deactivate --}}
                                <form action="{{ route('comments.toggle-status', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class="comment-action-btn {{ $comment->status ? 'comment-status-active' : 'comment-status-inactive' }}"
                                        title="{{ $comment->status ? 'Deactivate Comment' : 'Activate Comment' }}">

                                        <i data-feather="{{ $comment->status ? 'toggle-right' : 'toggle-left' }}"></i>

                                        <span>{{ $comment->status ? 'Active' : 'Inactive' }}</span>
                                    </button>
                                </form>

                                {{-- Read / Unread --}}
                                <form action="{{ route('comments.toggle-read', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                        class="comment-action-btn {{ $comment->is_read ? 'comment-read-btn' : 'comment-unread-btn' }}"
                                        title="{{ $comment->is_read ? 'Mark as Unread' : 'Mark as Read' }}">

                                        <i data-feather="{{ $comment->is_read ? 'mail' : 'mail' }}"></i>

                                        <span>{{ $comment->is_read ? 'Read' : 'Unread' }}</span>
                                    </button>
                                </form>

                                {{-- View --}}
                                <a href="{{ route('commentBackend.show', $comment->id) }}"
                                    class="comment-action-btn comment-status-inactive" title="View Comment">
                                    <i data-feather="eye"></i>
                                    <span>View</span>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('commentBackend.destroy', ['commentBackend' => $comment->id]) }}"
                                    method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="comment-action-btn"
                                        style="background:#7f1d1d !important;color:#fecaca !important;border-color:#ef4444 !important;"
                                        title="Delete Comment">
                                        <i data-feather="trash-2"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('change', '#status_button', function () {
            let comment_id = $(this).data('comment-id');
            let is_checked = $(this).is(':checked');

            // Send an ajax request to activate or deactivate a comment
            $.ajax({
                url: "{{ route('commentBackend.index') }}",
                method: "POST",
                data: { _token: "{{ csrf_token() }}", comment_id: comment_id, status: is_checked ? 1 : 0 },
                dataType: "json",
                success: function (result) {
                    if (result.status == 200) {
                        toastr.success('Comment status updated successfully!');
                    }
                }
            });
        });
    </script>
@endsection