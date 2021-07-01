<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserScocial;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    
    public function index(){

      

        $lang = session('lang','en');
        App::setLocale($lang);
        
       
        // $pass = '123456';
        // $pass = Hash::make($pass);
        // dd($pass);

        $user = User::find(3);

        /*
        User
            "id" => 3
            "name" => "Admin"
            "email" => "admin@gmail.com"
            "email_verified_at" => null
            "created_at" => null
            "updated_at" => null
            "role_id" => 1
            "group_id" => 1

            //Goi toi user_social
                "id" => 1
                "user_id" => 3
                "facebook" => "facebook"
                "instaram" => "instaram"
        */

        //gọi tới social thông qua MQH hasOne -> khai báo ở model User
        //dd( $user->social->facebook );

        $user_social = UserScocial::find(1);
        //gọi tới USER thông qua MQH belongsTO -> khai báo ở model UserSocial
        //dd( $user_social->nguoi_dung );


        //khai báo MQH books - 1 - N - hasMany ở model Category 
        //$category = Category::find(1)->books->toArray();

        $product = Product::find(3);
        $product = Product::where('id','=',3)->first();

        //dd($product);
        
        //dd( $product->category->name );
        //dd( $product->tags );

        // $tag = Tag::find(3)->products->toArray();
        // dd($tag);




        //tìm kiếm tất cả sách có category_id = 1 và stock = 0;

        //cách 1 truy vấn nhờ mối quan hệ hasMany
        $items = Category::find(1)->books()->where('stock','=',0)->get();

        //cách 2: truy vấn theo điều kiên
        $products = Product::where('category_id','=',1)->where('stock','=',0)->get();

    
        $check = View::exists( 'website.home.index' );
        
        return view('website.home.index',compact(['products']) );
    }
}
