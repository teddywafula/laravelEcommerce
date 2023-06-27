<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Category;

interface CategoryInterface
{
    public function findAll(): object;
    public function save(array $data): Category;
    public function update(array $data, Category $category): Category;
}
