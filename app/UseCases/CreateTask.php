<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CreateTask
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
    ) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * タスクを作成
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        // タスク内容を配列に設定する
        $taskData = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'content' => $request->content,
        ];

        // お問い合わせを作成する
        $task = $this->taskRepository->create($taskData);

        return response()->json([
            'task' => $task
        ], 200);
    }
}
