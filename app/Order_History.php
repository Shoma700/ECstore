<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_History extends Model
{
    protected $gurded = array('id');
    //
    public static $rules = array(
        'order_id' => 'required',
        'customer_cd' => 'bail|nullable|unique:posts|max:7',
        'orderd_product_cd' => 'required|max:7',
        'orderd_product_name' => 'required',
        'orderd_product_quantity' => 'required',
        'orderd_product_price' => 'required',
        'orderd_product_total_price' => 'required',
        'orderd_date' => 'required|date',
    );
}
