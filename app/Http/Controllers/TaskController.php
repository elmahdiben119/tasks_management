<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct() {
        $this->taskRepository = new  TaskRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return response()->json($this->taskRepository->getAll($user_id), 200);
        // return response($this->taskRepository->getAll(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response($this->taskRepository->create(\request()->all()),201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response($this->taskRepository->create(\request()->all()),200);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->taskRepository->find($id),200);
    }

    /**
     * Update the specified resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return response($this->taskRepository->update($id,\request()->all()),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response($this->taskRepository->destroy($id),200);
    }

    /**
     * Get the Type of Task.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function type($id)
    {
        return response()->json(Task::find($id)->type, 200);
    }
}
