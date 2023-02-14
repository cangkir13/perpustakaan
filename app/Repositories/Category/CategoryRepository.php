<?php

namespace App\Repositories\Category;

use App\Models\Categories;

class CategoryRepository implements CategoryInterface
{
    public function GetList()
    {
        return Categories::all();
    }
}
