<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Category::class;
    }

    public function getCategory()
    {
        // $category = $this->model->
        // dd()
        // Category::with(['products'])->root()->get();
        // return $this->model->select('name')->take(1)->get();
    }
}