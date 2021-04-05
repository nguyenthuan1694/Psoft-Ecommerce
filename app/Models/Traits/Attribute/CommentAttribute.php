<?php

namespace App\Models\Traits\Attribute;

/**
 * Trait CommentAttribute
 * @package App\Models\Traits\Attribute
 */
trait CommentAttribute
{
    public function getStatusLabelAttribute()
    {
        if ($this->status == config('common.comment.status.active')) {
            return '<span class="badge badge-success">Active</span>';
        } else {
            return '<span class="badge badge-secondary">Inactive</span>';
        }
    }

    public function getParentNameAttribute()
    {
        return isset($this->parent) ? $this->parent->name : '';
    }
}
