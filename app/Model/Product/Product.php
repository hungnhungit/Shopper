<?php

namespace App\Model\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;
class Product extends Model
{
	use SearchableTrait;

    public const COLUMN = ['id','sku','name','slug','price'];

    protected $searchable = [
        'columns' => [
            'name' => 10,
            'sku' => 5
        ]
    ];
    protected $fillable = [
        'sku'
    ];


    /**
     * @param string $term
     * @return Collection
     */
    public function searchProduct(string $term) : Collection
    {
        return self::search($term)->get(self::COLUMN);
    }
}
