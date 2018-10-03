<?php

namespace App\Http\Controllers\Font;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Product\Product;
use Krnfx;
use Krnfx\Widgets\Alert;
class WishlistController extends Controller
{
    public function index(){


    	//dd(krnfx::getWidgetManager());
    	
    	// return view('font.wishlist',[
    	// 	'products' => Product::find(Auth::user()->wishlists_product->pluck('product_id'))
    	// ]);
    	return view('widgets');
    	

    }
}
