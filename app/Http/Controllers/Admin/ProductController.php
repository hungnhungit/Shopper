<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product\Product;
use App\Model\Product\Interfaces\ProductRepositoryInterface;
use App\Model\Product\Repositories\ProductRepository;
use App\Model\Product\Tranforms\ProductTransformable;
class ProductController extends Controller
{

    use ProductTransformable;

	protected $rpoProduct;

    /**
     * @var perPage int
     */
    public const PER_PAGE = 5;

	/**
	 * Product construct
	 * @param ProductRepositoryInterface $rpoProduct
	 */

	public function __construct(ProductRepositoryInterface $rpoProduct){
		$this->rpoProduct = $rpoProduct;
	}

    public function index(Request $request){

        $list = $this->rpoProduct->getData(Product::COLUMN);

        //search query
        if($request->has('q') && $request->q != '' ){  
            $list = $this->rpoProduct->searchProducts($request->q);
        }
    	
    	// tranform data
    	$products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();
        $page = $this->rpoProduct->paginateArrayResults($products,self::PER_PAGE);



    	return view('admin.share',[
    		'columns' => array_slice(Product::COLUMN,1),
    		'datas' => $this->rpoProduct->paginateArrayResults($products,self::PER_PAGE),
            'title' => 'Product',
            'url' => 'product'
    	]);
	}
    public function destroy($id){

        $product = $this->rpoProduct->find($id);

        $product->delete();
        
        return redirect()->route('admin.product.index')->with('message','Delete Product Successfully');
    }
}
