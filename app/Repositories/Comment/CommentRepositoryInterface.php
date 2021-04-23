<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function getCommentWithProductSubcomment($productId);

    public function deleteCommentById($id);

    public function trashedComment();

    public function restoreCommentById($id);
    
    public function forceDeleteComment($id);
}