<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        echo __METHOD__;
        //return Product::find($id);
        return Product::where('slug', $id)->first();
    }
}