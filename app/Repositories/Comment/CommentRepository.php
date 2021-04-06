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
}