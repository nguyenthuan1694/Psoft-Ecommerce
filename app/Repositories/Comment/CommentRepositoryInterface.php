<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function getCommentWithProductSubcomment($productId);
}