<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use App\Http\Requests\CommentStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['products'])->root()->get();
        return view('frontend.home')
                ->with('categories', $categories)
            ;
    }

    /**
     * Show the category page
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory(Request $request, $slug)
    {
        $category = Category::with('parent')->where('slug', '=', $slug)->first();
        $products = $category->products()->paginate(config('common.pagination.frontend'));
        return view('frontend.category')
            ->with('category', $category)
            ->with('products', $products)
        ;
    }

    /**
     * Show the product page
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(Request $request, $slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $products = Product::where('slug', '<>', $slug)->orderBy('created_at','DESC')->get();
        $comments = Comment::with('subComments')->where('product_id',$product->id)
                            ->where('status', '<>', 0)->get();
        $commentsTotal = $comments->count();
        return view('frontend.product')
                ->with('product', $product)
                ->with('products', $products)
                ->with('comments', $comments)
                ->with('commentsTotal', $commentsTotal)
        ;
    }

    /**
     * Search products
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->get('query');
        $products = Product::search($keyword)->paginate(config('common.pagination.frontend'));
        return view('frontend.search')
                ->with('products', $products)
                ->with('keyword', $keyword)
            ;
    }

    public function showIntroduce()
    {
        return view('frontend.introduce');
    }

    /**
     * Store a new info customer.
     *
     * @param CommentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CommentStoreRequest $request)
    {
        Comment::create($request->all());
        return redirect()->route('product', [$request->slug])->with('success', 'You have successfully created a new product');
    }
}
