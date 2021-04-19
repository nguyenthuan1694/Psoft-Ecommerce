<?php

namespace App\Models;

use App\Models\Traits\Attribute\ProductAttribute;
use App\Models\Traits\Relationship\ProductRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Scout\Searchable;
// use Spatie\Searchable\SearchResult;

class Product extends Model
{
    use ProductRelationship,
        ProductAttribute,
        SoftDeletes
        ;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    protected $with = ['images'];

    public $asYouType = true;

    // public function getSearchResult(): SearchResult
    // {
    //     return new SearchResult(
    //         $this,
    //         $this->id,
    //         $this->sku,
    //         $this->name,
    //         $this->slug
    //     );
    // }

    public function searchableAs()  
    {
        return 'products_index';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
