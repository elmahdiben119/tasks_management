<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Services\Tasks\TaskService;
use Illuminate\Database\Eloquent\Model;

class TaskRepository implements EloquentRepositoryInterface
{

    protected $taskService;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function getAll($user_id){
        return $this->taskService->getAll($user_id);
    }


    public function create(array $attributes){
        $this->taskService->create($attributes);
    }


    public function find($id){
        $this->taskService->find($id);
    }


    public function update($id,array $attributes){
        $this->taskService->update($id,$attributes);
    }


    public function destroy($id){
        $this->taskService->destroy($id);
    }
}

