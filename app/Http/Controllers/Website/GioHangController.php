<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    
    // public function __construct(){
    //     session()->put('cart',[]);
    // }

    public function index(){
        $gio_hang = session('cart',[]); // []
        echo '<pre>';
        print_r( $gio_hang );
         echo '</pre>';
    }

    public function add_to_cart($product_id, $so_luong = 1 ){
        //gán vào biến giỏ hàng từ session, ko có thì là MẢNG rỗng
       $gio_hang = session('cart',[]); // []

       //kiểm tra product_id đã tồn tại trong mảng hay không
       if( isset($gio_hang[$product_id]) ){
            //có => cộng dồn số lượng
            $gio_hang[$product_id] += $so_luong;
       }else{
           //không có => đặt cho nó bằng 1
            $gio_hang[$product_id] = $so_luong;
       }
       //đặt lại vào session gio hang
       session(['cart'=>$gio_hang]);

       //chuyển hướng về trang giỏ hàng hoặc sản phẩm
       return redirect()->route('cart.index');
       //return redirect('/san-pham');

    }
}
