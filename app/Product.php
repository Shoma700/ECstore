<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = array('id');
    //
    public static $rures = array(
        'product_cd' => 'required',
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required',
        'product_stock' => 'required',
        'product_image_path' => 'nullable',
        'product_class' => 'required'
    );
}
