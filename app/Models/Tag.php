<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public function products(){
        return $this->belongsToMany( Product::class ,'product_tag','id_product_tag','id_product' );
    }

}
