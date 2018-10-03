<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// $parser = new \Smalot\PdfParser\Parser();
// $pdf    = $parser->parseFile(__DIR__.'/php_tutorial.pdf');
 
// $text = $pdf->getText();
// echo $text;
// die;

use Illuminate\Http\Request;
use \Smalot\PdfParser\Parser;
Route::get('search_engine', function(Request $request) {
	//pdf
	if($request->has('q') && $request->q !=''){
		
	
	$parser = new Parser();
	$pdf = $parser->parseFile(__DIR__.'/php_tutorial.pdf');

	$pages  = $pdf->getPages();

	//search
	$countQuery = 0;
	foreach ($pages as $page) {
		$text = $page->getText();
		$arrSearch = explode(' ',$text);
		if (in_array($request->q,$arrSearch)) {
			if(++$countQuery > 10){
				break;
			}
		}
	 //    for ($i=0; $i < strlen($text); $i++) {
		// }
	}
	}
	dd($countQuery,$request->q);
	die;
 

	// foreach ($details as $property => $value) {
 //    if (is_array($value)) {
 //        $value = implode(', ', $value);
 //    }
 //    echo $property . ' => ' . $value . "\n";
	// }

	// $pages  = $pdf->getPages();

	// foreach ($pages as $page) {
 //    echo $page->getText();
    return view('search');
})->name('google.search');

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/tester',function(){
	return "hungit";
});

//Route::resource('product','Admin\ProductController');

Route::resource('cart','Admin\CartController');

Route::get('clear/cart',[
	'uses' => 'Admin\CartController@clear',
	'as' => 'cart.clear'
]);

// login admin

Route::namespace('Admin')->group(function(){

	Route::get('admin/login','LoginController@showLogin')->name('admin.showLogin');

	Route::post('admin/login','LoginController@login')->name('admin.login');
	
	Route::post('admin/logout','LoginController@logout')->name('admin.logout');
});

// back-end

Route::group(['prefix' => 'admin','middleware' => 'admin','as' => 'admin.' ], function () {
    Route::namespace('Admin')->group(function () {
    	Route::get('/','AdminController@index')->name('index');
    	Route::resource('product','ProductController');
    	Route::resource('category','CategoryController');
    });
    
});

// font-end

Route::namespace('Font')->group(function(){

	Route::get('product','ProductController@index')->name('product.index');
	Route::get('product/{product}/wishlist','ProductController@wishlist')->name('product.wishlist');
	Route::get('wishlist','WishlistController@index')->name('wishlist.index');
});

Route::get('upload','Admin\UserController@showFormUpload')->name('upload.index');

Route::post('test','Admin\UserController@files')->name('upload.store');

Route::get('/api/categories',function(){
	return App\Model\Category\Category::all();
});


Route::get('/api/wishlist',function(){
	return App\Model\Wishlist\Wishlist::all();
});

Route::get('/api/product/{id}',function($id){
	$product = App\Model\Product\Product::find($id);
	return $product->category;
});

Route::get('/api/user/{id}',function($id){
	$user = App\User::find($id);
	return $user->wishlists_product;
});


