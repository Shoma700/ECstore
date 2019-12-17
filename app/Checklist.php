<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'ordered_date' => 'required',
        'order_id' => 'required',
        'ordered_product_total_price' => 'required',
        'customer_cd' => 'nullable|alpha_num|max:7',
        'customer_name' => 'required',
        'contact' => 'nullable',
        'contact_date' => 'nullable|date',
        'payment_confirmation' => 'nullable',
        'payment_confirmation_date' => 'nullable|date',
        'shipping' => 'nullable',
        'shipping_date' => 'nullable|date',
        'remarks' => 'nullable'
    );
}
