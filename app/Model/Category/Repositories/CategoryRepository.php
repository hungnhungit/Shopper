<?php 



namespace App\Model\Category\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Model\Category\Category;
use Illuminate\Support\Collection;
use App\Model\Category\Interfaces\CategoryRepositoryInterface;
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface{




 	/**
     * ProductRepository constructor.
     * @param Product $product
     */
	public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }

     /**
     * List all the products
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listCategory(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    public function getData(array $columns = ['*']) : Collection{
        return $this->listCategory('id','desc',$columns);
    }

    public function searchCategory(string $text){
        $datas = Category::where('name', $text)
        ->orWhere('slug', 'like', '%' . $text . '%')->paginate(self::PER_PAGE);
        return $datas;
    }

    /**
     * @param  $perPage
     * @return Collection
     */
    public function paginateCategory($perPage){
        return $this->model->paginate($perPage);
    }


    /**
     * [findBySlug description]
     * @param  array $slug [description]
     * @return [Category]          [description]
     */
    public function findBySlug($slug) : Category{
        return $this->findBy($slug)->first();
    }


}

 ?>