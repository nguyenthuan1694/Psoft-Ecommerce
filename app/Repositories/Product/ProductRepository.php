<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getProduct()
    {
        return $this->model->select('name')->take(1)->get();
    }
}