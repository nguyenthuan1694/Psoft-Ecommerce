<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{

     /**
     * @var CategoryRepositoryInterface|\App\Repositories\Repository
     */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of categories.
     *
     * @return View
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('backend.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $allCategory = $this->categoryRepository->getAll();
        return view('backend.category.create')->with('allCategory', $allCategory);
    }

    /**
     * Store a new category.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->categoryRepository->create($request->all());
        return redirect()->route('categories.index')->with('success', 'You have successfully created a new category');
    }

    /**
     * Display the product.
     *
     * @param Category $category
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the product.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        $allCategory = $this->categoryRepository->getAll();
        return view('backend.category.edit')
            ->with('category', $category)
            ->with('allCategory', $allCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->categoryRepository->update($request->id, $request->all());
        return redirect()->route('categories.index')->with('success', 'You have successfully updated the category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->children->each(function ($item) {
           $item->parent_id = null;
           $item->save();
        });
        $category->products()->detach();
        $category->delete();

        return redirect()->back()->with('success', 'You have successfully deleted the category');
    }
}
