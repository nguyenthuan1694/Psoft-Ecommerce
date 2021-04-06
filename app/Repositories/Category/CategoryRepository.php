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

    public function getCategory($slug)
    {
        $category =  $this->model->with('parent')->where('slug', '=', $slug)->first();
        $products = $category->products()->paginate(config('common.pagination.frontend'));
        return [$category, $products];
    }
}