<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;
class Category extends Model
{
    use SearchableTrait;

    public const COLUMN = ['id','name','slug','parent_id'];

    protected $searchable = [
        'columns' => [
            'name' => 10,
            'slug' => 5
        ]
    ];

    /**
     * @param string $term
     * @return Collection
     */
    public function searchCategory(string $term) : Collection
    {
        return self::search($term)->get(self::COLUMN);
    }
}
