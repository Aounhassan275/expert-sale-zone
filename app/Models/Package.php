<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','direct_income','indirect_income','withdraw_limit','income_limit'
    ];
}
