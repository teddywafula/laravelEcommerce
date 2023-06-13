<?php

namespace App\Repository;

use App\Contracts\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function findAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Category::all();
    }

    public function save(array $data ): Category
    {
        $category = new Category();

        if (!empty($data['name'])) {
            $category->name = $data['name'];
        }
        $category->save();
        return $category;
    }

    public function update($data, $category): Category
    {
        if (!empty($data['name'])) {
            $category->name = $data['name'];
        }
        $category->save();
        return $category;
    }
}
