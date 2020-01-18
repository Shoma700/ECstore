<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'customer_cd' => 'required|unique:posts|max:7',
        'customer_name' => 'required',
        'customer_postal_code' => 'required|alpha_num|max:7',
        'customer_address' => 'required',
        'customer_mail' => 'required',
        'customer_tel' => 'required'
    );
}
