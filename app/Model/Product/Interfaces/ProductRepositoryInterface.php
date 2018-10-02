<?php 

namespace App\Model\Product\Interfaces;
use App\Model\Product\Product;
use Illuminate\Support\Collection;
interface ProductRepositoryInterface{
	public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;
	public function searchProducts(string $text) : Collection;
}

 ?>