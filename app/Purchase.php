<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    // protected $guarded = [];
    protected $fillable = ['beverage_id', 'price'];

}
