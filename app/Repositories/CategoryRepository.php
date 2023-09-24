<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected Category $category;

    public function __construct(
        Category $category
    ) {
        $this->category = $category;
    }

    /**
     * カテゴリーを全件取得する
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->category->get();
    }
}
