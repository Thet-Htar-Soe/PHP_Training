<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

/**
 * This is Task controller.
 * This handles Task CRUD processing.
 */
class TaskController extends Controller
{
    /**
     * task interface 
     * */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show create task view
     * 
     * @return View tasks
     */
    public function create()
    {
        $datas = $this->taskInterface->create();
        return view('tasks', compact('datas'));
    }

    /**
     * To submit task create 
     * @param Request $request
     * @return View tasks 
     */
    public function store(Request $request)
    {
        // validation for request values
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Please Enter Your Task!!!'
        ]);
        $task = $this->taskInterface->savePost($request);
        return redirect('/');
    }

    /**
     * To delete task by id
     * @return View tasks
     */
    public function delete($id)
    {
        $this->taskInterface->deletePostById($id);
        return redirect('/');
    }

    /**
     * Show tasks edit
     * 
     * @return View tasks
     */
    public function edit($id)
    {
        $data = $this->taskInterface->edit($id);
        return view('edit', compact('data'));
    }

    /**
     * Submit task update
     * @param Request $request
     * @param $taskId
     * @return View tasks
     */
    public function update(Request $request, $id)
    {
        // validation for request values
        request()->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Please Enter Your Task!!!'
        ]);
        $this->taskInterface->updatePost($request, $id);
        return redirect('/');
    }
}
