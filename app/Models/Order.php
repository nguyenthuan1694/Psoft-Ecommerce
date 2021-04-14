<?php

namespace App\Models;

use App\Models\Traits\Attribute\OrderAttribute;
use App\Models\Traits\Relationship\OrderRelationship;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use OrderRelationship,
        OrderAttribute;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
}
