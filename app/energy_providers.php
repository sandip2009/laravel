<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class energy_providers extends Model
{
    //
    protected $fillable = [
        'provider_name', 'product_name','product_variation','monthly_price'
    ];
}
