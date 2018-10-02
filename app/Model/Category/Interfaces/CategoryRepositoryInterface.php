<?php 

namespace App\Model\Category\Interfaces;
use App\Model\Category\Category;
use Illuminate\Support\Collection;
interface CategoryRepositoryInterface{
	public function listCategory(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;
	public function searchCategory(string $text);
}

 ?>