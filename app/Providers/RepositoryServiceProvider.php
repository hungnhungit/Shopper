<?php 

namespace App\Providers;
use App\Model\Product\Interfaces\ProductRepositoryInterface;
use App\Model\Product\Repositories\ProductRepository;
use App\Model\Category\Interfaces\CategoryRepositoryInterface;
use App\Model\Category\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider{



	 public function register(){
	 	 $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

	 	 $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );


		}
}
 ?>