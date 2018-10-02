<?php 



namespace App\Model\Product\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Model\Product\Product;
use Illuminate\Support\Collection;
use App\Model\Product\Interfaces\ProductRepositoryInterface;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface{


 	/**
     * ProductRepository constructor.
     * @param Product $product
     */
	public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }

     /**
     * List all the products
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }
    public function getData(array $columns = ['*']) : Collection{
        return $this->listProducts('id','desc',$columns);
    }
    public function searchProducts(string $text) : Collection{
        return $this->model->searchProduct($text);
    }

}

 ?>