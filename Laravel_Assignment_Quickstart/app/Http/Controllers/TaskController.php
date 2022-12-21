<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * To show create task view
     * 
     * @return View tasks
     */
    public function create()
    {
        $datas =  Task::all();
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

        $name = request()->name;
        Task::create([
            'name' => $name
        ]);
        return redirect('/');
    }

    /**
     * To delete tasks by id
     * @return View tasks
     */
    public function delete($id)
    {
        Task::where('id', $id)->delete();
        return redirect('/');
    }

    /**
     * Show task edit
     * 
     * @return View edit
     */
    public function edit($id)
    {
        $data = Task::where('id', $id)->first();
        return view('edit', compact('data'));
    }

    /**
     * Submit task edit
     * @param $taskId
     * @return View  edit 
     */
    public function update($id)
    {
        // validation for request values
        request()->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Please Enter Your Task!!!'
        ]);
        $name = request()->name;
        Task::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect('/');
    }
}
