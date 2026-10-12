<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->validate([
            'status' => ['nullable', 'in:unread,read'],
            'search' => ['nullable', 'string', 'max:255'],
        ]);

        $query = Comment::query();

        if (!empty($filters['status'])) {
            if ($filters['status'] === 'unread') {
                $query->unread();
            } elseif ($filters['status'] === 'read') {
                $query->read();
            }
        }

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function (Builder $query) use ($search) {
                $query->where('user_name', 'like', '%' . $search . '%')
                    ->orWhere('user_email', 'like', '%' . $search . '%')
                    ->orWhere('post_id', 'like', '%' . $search . '%')
                    ->orWhere('comment', 'like', '%' . $search . '%');
            });
        }

        $comments = $query->latest()->paginate(10)->appends($request->query());

        $stats = [
            'total' => Comment::count(),
            'unread' => Comment::unread()->count(),
            'read' => Comment::read()->count(),
            'today' => Comment::whereDate('created_at', today())->count(),
        ];

        return view('admin.comment.index', compact('comments', 'stats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comment.show', compact('comment'));
    }

    public function toggleRead(Comment $comment)
    {
        $comment->update([
            'is_read' => !$comment->is_read,
        ]);
        $statusMessage = $comment->is_read ? 'Message marked as read.' : 'Message marked as unread.';
        return back()->with('success', $statusMessage);
    }

    public function toggleStatus(Comment $comment)
    {
        $comment->status = !$comment->status;
        $comment->save();

        return redirect()
            ->back()
            ->with(
                'success',
                $comment->status ? 'Comment activated successfully.' : 'Comment deactivated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()
            ->route('commentBackend.index')
            ->with('success', 'Comment deleted successfully.');
    }
}
