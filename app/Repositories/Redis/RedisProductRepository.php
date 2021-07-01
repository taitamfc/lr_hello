<?php
namespace App\Repositories\Redis;

use App\Models\Product;

use App\Repositories\Contracts\ProductRepositoryInterface;

class RedisProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function find($id)
    {
        echo __METHOD__;
        return Product::where('slug', $id)->first();
    }
}