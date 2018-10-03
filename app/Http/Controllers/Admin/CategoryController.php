<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Category;
use App\Services\TestService;
use Krnfx;
class CategoryController extends Controller
{
	protected $rpoCategory;

	protected $service;

	/**
	 * @param  $PER_PAGE 
	 */
	public const PER_PAGE = 5;

	/**
	 * constructor 
	 */
    public function __construct(CategoryRepositoryInterface $rpoCategory,TestService $service){
    	$this->rpoCategory = $rpoCategory;
    	$this->service = $service;
    }

    /**
     * @return view
     */
    public function index(Request $request){


    	$datas = $this->rpoCategory->paginateCategory(self::PER_PAGE);

    	if($request->has('q') && $request->q){
    		$datas = $this->rpoCategory->searchCategory($request->q);
    	}



    	// $categories = $list->map(function (Category $item) {
     //        return $this->transformProduct($item);
     //    })->all();
    	//$this->rpoCategory->paginateArrayResults($categories,self::PER_PAGE)
    	return view('admin.share',[
    		'columns' => Category::COLUMN,
    		'datas' => $datas,
    		'title' => 'Category',
    		'url' =>'category'
    	]);
    }
}
