<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ShoppingCart;

use App\Product;

class MainController extends Controller
{
    public function home(){

    	$products = Product::latest()->paginate(4);



    	return view('main.home')->with('products', $products);
    }
}
