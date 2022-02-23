<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingRule extends Model
{
    use HasFactory;

    protected $table = 'shipping_rule';

    protected $guarded = [
        'id'
    ];

    protected $dates = ['expire_date'];


    
}
