<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        Auth::logout();
        Auth::loginUsingId(2);
    }
    public function index( Request $request ){
        $items = Product::all();
        return view('website.sanpham.index',compact(['items']) );
    }
  
    public function show( Product $product,$id ){
        $this->authorize('view', $product);

        $item = $this->productRepository->find($id);
        return view('website.sanpham.show',compact(['item']) );
    }
}