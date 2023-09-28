<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function getAll(): Collection;
    public function getAllInProgress(): Collection;
    public function find(int $id): ?Task;
    public function create(array $taskData): Task;
}
