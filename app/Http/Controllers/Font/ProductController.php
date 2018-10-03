<?php

namespace App\Http\Controllers\Font;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Product;
use App\Model\Product\Interfaces\ProductRepositoryInterface;
use App\Model\Product\Repositories\ProductRepository;
use App\Model\Category\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Repositories\CategoryRepository;
use App\Model\Wishlist\Wishlist;
use Auth;
class ProductController extends Controller
{

	/**
	 * [$rpoProduct description]
	 * @var ProductRepositoryInterface
	 */
	protected $rpoProduct;

    /**
     * [$rpoCategory description]
     * @var CategoryRepositoryInterface
     */
    protected $rpoCategory;

	public function __construct(ProductRepositoryInterface $rpoProduct,CategoryRepositoryInterface $rpoCategory){
		$this->rpoProduct = $rpoProduct;
        $this->rpoCategory = $rpoCategory;
	}

    public function index(Request $request){

        $products = $this->rpoProduct->listProducts();

        if($request->has('category')){
            $category = $this->rpoCategory->findBySlug(['slug' => $request->category]);
            $products = $category->products;
            $selectCategory = $request->category;
        }


    	return view('font.products.index',[
            'categories' => $this->rpoCategory->listCategory(),
    		'products' => $products,
    		'products_random' => Product::all()->random(3),
            'selectCategory' => isset($selectCategory) ? $selectCategory : null
    	]);

    }

    /**
     * [wishlist description]
     * @param  int $product 
     * @return view          
     */
    public function wishlist($product){

    	$wishlist = new Wishlist();

    	$wishlist->user_id = Auth::user()->id;
    	$wishlist->product_id = $product;

    	$wishlist->save();

    	return back()->with('message','Wishlist Successfully');

    }
  
}
