<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public $directory;

    public function __construct()
    {
        $this->directory = 'expert-user-panel';
    }
    public function showProducts()
    {
        $products = Product::paginate(30);
        return view($this->directory.'.product.index',compact('products'));
    }
    public function showProductDetails($name)
    {
        $product = Product::where('name',str_replace('_', ' ',$name))->first();
        return view($this->directory.'.product.show',compact('product'));
    }
    public function orderProducts($id)
    {
        $product = Product::find($id);
        return view($this->directory.'.product.create_order',compact('product'));
    }
}
