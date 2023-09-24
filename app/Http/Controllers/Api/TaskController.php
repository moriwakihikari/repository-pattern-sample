<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
    ) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * タスク一覧
     * 
     * @return JsonResponse
     */
    public function index()
    {
        $tasks = $this->taskRepository->getAll();
        return response()->json([
            'tasks' => $tasks
        ], 200);
    }

    /**
     * タスク詳細
     * 
     * @param int $id 
     * @return JsonResponse
     */
    public function show($id)
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
    }
}
