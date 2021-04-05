<?php


namespace App\Models\Traits\Relationship;


trait CommentRelationship
{

    /**
     * Get comment user
     * @return User
     */
    public function user() {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }

    /**
     * Get list sub comment
     * @return Comment
     */

    public function subComments() {
        return $this->hasMany('App\Models\Comment','parent_id','id')->where('status','<>',0);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Comment', 'parent_id');
    }

    /**
     * Get the products that owns the comment.
     */
    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}