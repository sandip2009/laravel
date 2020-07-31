<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    //
    protected $fillable = [
        'provider_name', 'product_name','monthly_price'
    ];
}
