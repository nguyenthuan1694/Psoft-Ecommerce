<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Product::class;
    }

    public function getProductWidthPagination()
    {
        return $this->model->paginate(config('common.pagination.backend'));
    }

    public function getProductBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->first();
    }

    public function getProductOtherSlug($slug)
    {
        return $this->model->where('slug', '<>', $slug)->get();
    }
}