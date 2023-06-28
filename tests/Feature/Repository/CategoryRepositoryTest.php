<?php

namespace Tests\Feature\Repository;

use App\Models\Category;
use App\Repository\CategoryRepository;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_save(): void
    {
        $data = [
            'name' => 'test'
        ];
        $categoryRepository = new CategoryRepository();
        $categoryRepository->save($data);
        $this->assertDatabaseCount(Category::class, 1);

    }

    public function test_find_all(): void
    {
        $categoryRepository = new CategoryRepository();
        $this->seed(CategorySeeder::class);
        $this->assertDatabaseCount(Category::class, 5);
        $records = $categoryRepository->findAll();
        $this->assertCount(5, $records);
    }

    public function test_update(): void
    {

    }
}
