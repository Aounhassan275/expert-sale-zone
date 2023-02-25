<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name','value'
    ];
    public static function siteName(){
        return (new static)::where('name','Site Name')->first()->value;
    }
    public static function phone(){
        return (new static)::where('name','Phone')->first()->value;
    }
    public static function email(){
        return (new static)::where('name','Email')->first()->value;
    }
    public static function facebook(){
        return (new static)::where('name','Facebook')->first()->value;
    }
    public static function twitter(){
        return (new static)::where('name','Twitter')->first()->value;
    }
    public static function youtube(){
        return (new static)::where('name','Youtube')->first()->value;
    }
    public static function instagram(){
        return (new static)::where('name','Instagram')->first()->value;
    }
    public static function address(){
        return (new static)::where('name','Address')->first()->value;
    }
}
