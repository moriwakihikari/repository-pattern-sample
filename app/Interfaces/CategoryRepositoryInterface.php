<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getAll(): Collection;
}
