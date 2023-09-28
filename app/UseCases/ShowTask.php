<?php

declare(strict_types=1);

namespace App\UseCases;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowTask
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
     * @param int $id
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $task = $this->taskRepository->find($id);
            return response()->json([
                'task' => $task
            ], 200);
        } catch (ModelNotFoundException $e) {
            $result = 'not found';
            return response()->json(
                [
                    $result => 404
                ],
                404
            );
        }

        return $task;
    }
}
