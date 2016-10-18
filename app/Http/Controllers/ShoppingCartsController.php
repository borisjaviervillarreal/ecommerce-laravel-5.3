<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ShoppingCart;

use App\PayPal;

use App\Order;


class ShoppingCartsController extends Controller
{

    public function __construct(){
        $this->middleware('shoppingcart');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $shopping_cart = $request->shopping_cart;
        
        $products = $shopping_cart->products()->paginate(6);

        $total = $shopping_cart->total();

        return view('shopping_carts.index')->with('products', $products)->with('total', $total);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopping_cart = ShoppingCart::where('customid', $id)->first();

        $order = $shopping_cart->order();

        return view('shopping_carts.completed')->with('shopping_cart', $shopping_cart)->with('order', $order);
    }

    public function checkout(Request $request){

        $shopping_cart = $request->shopping_cart;

        $paypal = new PayPal($shopping_cart);

        $payment = $paypal->generate();

        return redirect($payment->getApprovalLink());

        
    }
}
