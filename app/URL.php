<?php
namespace App;

class URL
{
    public function sluggify($text, $divider = '-', $maxLength = 96)
    {
       return str_slug($text, $divider);

       $product = new Product();
       $product->name = $request->name;
       $product->slug = $request->name;
    }
}
