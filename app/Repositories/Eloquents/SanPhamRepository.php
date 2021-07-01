<?php
namespace App\Repositories\Eloquents;

use App\Models\SanPham;
use App\Repositories\Contracts\ProductRepositoryInterface;

class SanPhamRepository implements ProductRepositoryInterface {
    public function all()
    {
        return SanPham::all();
    }

    public function find($id)
    {
        echo __METHOD__;
        //return Product::find($id);
        return SanPham::where('slug', $id)->first();
    }
}