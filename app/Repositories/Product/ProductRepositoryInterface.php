<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getProductWidthPagination();
    public function getProductBySlug($slug);
    public function getProductOtherSlug($slug);
}