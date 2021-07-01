<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Tag;

class Product extends Model
{
    use HasFactory;

    //khai bao bang model se lam viec
    protected $table        = 'products';

    //khai bao khoa chinh
    protected $primaryKey   = 'id';

    //tu dong insert created_at va updated_at
    public $timestamps      = true;

    //chon cau hinh ket noi
    //protected $connection   = 'mysql2';

    public function category(){
        return $this->belongsTo( Category::class , 'category_id', 'id' );
    }

    public function tags(){
        return $this->belongsToMany( Tag::class ,'product_tag','id_product','id_product_tag' );
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
