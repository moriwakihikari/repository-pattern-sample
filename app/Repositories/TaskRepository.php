<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    protected Task $task;

    public function __construct(
        Task $task
    ) {
        $this->task = $task;
    }

    /**
     * タスクを全件取得する
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->task->get();
    }

    /**
     * 進行中のタスクを全件取得する
     *
     * @return Collection
     */
    public function getAllInProgress(): Collection
    {
        return $this->task->where('status', false)->get();
    }

    /**
     * タスクを一件取得する
     * 
     * @param int $id
     * @return Task|null
     */
    public function find($id): ?Task
    {
        return $this->task->findOrFail($id);
    }
}
