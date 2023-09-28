<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\TaskRepositoryInterface;
use App\UseCases\CreateTask;
use App\UseCases\GetTasks;
use App\UseCases\ShowTask;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @param GetTasks $usecase
     * @return JsonResponse
     */
    public function index(GetTasks $usecase)
    {
        return $usecase();
    }

    /**
     * タスク詳細
     * 
     * @param int $id 
     * @param ShowTask $usecase
     * @return JsonResponse
     */
    public function show(int $id, ShowTask $usecase)
    {
        return $usecase($id);
    }

    /**
     * タスク作成
     * 
     * @param Request $request
     * @param CreateTask $usecase
     * @return JsonResponse
     */
    public function create(Request $request, CreateTask $usecase)
    {
        return $usecase($request);
    }
}
