<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = array('id');
    //
    public static $rures = array(
        'product_cd' => 'required',
        'product_name' => 'required',
        'product_price' => 'required',
        'product_cart_stock' => 'required'
    );
}
