<?php

namespace App\Models;

use App\Models\Traits\Attribute\CommentAttribute;
use App\Models\Traits\Relationship\CommentRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use CommentRelationship,
        CommentAttribute,
        SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'comments';

    protected $with = ['products', 'subComments'];
    
    protected $dates = ['created_at', 'updated_at'];

}