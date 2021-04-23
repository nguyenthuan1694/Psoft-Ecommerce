<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\View\View;
use App\Repositories\Comment\CommentRepository;

class CommentController extends Controller
{

    /**
     * @var CommentRepositoryInterface|\App\Repositories\Repository
     */
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    
    /**
     * Display a listing of comment.
     *
     * @return View
     */
    public function index()
    {
        $comments = $this->commentRepository->getAll();
        return view('backend.comment.index')
                    ->with('comments', $comments)
        ;
    }

    /**
     * Show the form for editing the comment.
     *
     * @param Comment $comment
     * @return View
     */
    public function show(Comment $comment)
    {
        $allComment = $this->commentRepository->getAll();
        $allStatus = config('common.comment.status');
        return view('backend.comment.show')
                ->with('comment', $comment)
                ->with('allComment', $allComment)
                ->with('allStatus', $allStatus)
        ;
    }

    /**
     * Show the form for editing the comment.
     *
     * @param Comment $comment
     * @return View
     */
    public function edit(Comment $comment)
    {
        $allComment = $this->commentRepository->getAll();
        $allStatus = config('common.comment.status');
        return view('backend.comment.edit')
                ->with('comment', $comment)
                ->with('allComment', $allComment)
                ->with('allStatus', $allStatus)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommentUpdateRequest $request
     * @param Comment $comment 
     * @return RedirectResponse
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        if($request->cmt_update) {
            $comment->update($request->all());
        } else {
            $this->commentRepository->create($request->all());
            $this->commentRepository->update($comment->id, ['status' => 1]);
        }
        
        return redirect()->route('comments.index')->with('success', 'You have successfully updated the category');
    }

    /**
     * Move the comment to trash.
     *
     * @param Comment $comment
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Comment $comment)
    {
        $this->commentRepository->deleteCommentById($comment['id']);
        return redirect()->back()->with('success', 'You have successfully move the comment to trashed');
    }

    /**
     * Display a listing of the trashed comment.
     *
     * @return View
     */
    public function trashed()
    {
        $comments = $this->commentRepository->trashedComment();
        return view('backend.comment.trashed')->with('comments', $comments);
    }

    /**
     * Restored a trashed comment.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function restore(Request $request, $id)
    {
        $comments = $this->commentRepository->restoreCommentById($id);
        $comments->restore();
        return redirect()->back()->with('success', 'You have successfully restored the comment');
    }

    /**
     * Force delete a trashed comment.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function forceDelete($id)
    {
        $comments = $this->commentRepository->forceDeleteComment($id);
        $comments->forceDelete();
        return redirect()->back()->with('success', 'You have successfully deleted the comment');
    }
}


