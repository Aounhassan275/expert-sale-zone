<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name','price','direct_income','indirect_income','withdraw_limit','income_limit',
        'indirect_income_level','product_income','expense_income','flash_income','reward_income',
        'loss_income','salary'
    ];
}
