<?php
namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function getCommentWithProductSubcomment($productId)
    {
        return $this->model->with('subComments')->where('product_id',$productId)->where('status', '<>', 0)->get();
    }

    // Delete comment by $id
    public function deleteCommentById($id)
    {
        return $this->model->where('id',$id)->first()->delete();
    }

    // trashed Comment
    public function trashedComment()
    {
        return $this->model->onlyTrashed()->paginate(config('common.backend.pagination'));
    }

    // restore Comment by $id
    public function restoreCommentById($id)
    {
        return $this->model->onlyTrashed()->where('id', $id)->first();
    }

    // forceDelete comment by $id
    public function forceDeleteComment($id)
    {
        return $this->model->onlyTrashed()->where('id', $id)->first();
    }
}