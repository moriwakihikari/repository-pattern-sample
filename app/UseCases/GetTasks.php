<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class GetTasks
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
    ) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * タスク一覧を取得
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $tasks = $this->taskRepository->getAll();

        return response()->json([
            'tasks' => $tasks
        ], 200);
    }
}
