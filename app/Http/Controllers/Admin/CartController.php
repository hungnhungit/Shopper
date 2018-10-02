<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ShopingCart;
use App\Model\Product\Product;

class CartController extends Controller
{
	protected $cart;
	function  __construct(ShopingCart $cart){

		$this->cart = $cart;
	}
    public function index(){

    	//$product = Product::find(1)->toArray();
    	//$this->cart->addToCart($product,1);
        //dd($this->cart->getCartItems());
    	return view('font.carts.cart',[
    		'carts' => $this->cart->getCartItems(),
            'count' => $this->cart->countItems(),
            'total' => $this->cart->total()
    	]);
    }
    public function store(Request $request){

        $product = Product::find($request->id)->toArray();
        $this->cart->addToCart($product,$request->qty);
        return back()->with('message', 'Add to cart successful');;

    }
    public function destroy($id){
        //set user
        $this->cart->removeToCart($id);

        return redirect()->route('cart.index');
    }

    public function clear(){
        // set user 
        $this->cart->clearCart();

        return redirect()->route('cart.index');
    }
    public function update(){
        
    }
}