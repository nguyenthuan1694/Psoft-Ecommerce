<?php
namespace App\Repositories\Comment;

use App\Repositories\BaseRepository;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Comment::class;
    }

    public function getCommentWithProductSubcomment()
    {
        return $this->model->select('name')->take(1)->get();
    }
}