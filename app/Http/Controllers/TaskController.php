<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::latest()->get();
        return view('tasks.tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        //Validation

        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required|min:3',
            'status' => 'required|integer',
            'user_id' => 'required|integer',
            'assign' => 'required|integer'
        ]);



        Task::create(request(['name','description','status','user_id','assign']));

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);

        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //validate input
        $this->validate(request(),[
            'name' => 'required',
            'description' => 'required|min:3',
            'status' => 'required|integer',
            'assign' => 'required|integer'
        ]);

        //update
        $task  = Task::find($id);
        $task->name             = request('name');
        $task->description      = request('description');
        $task->status           = request('status');
        $task->assign           = request('assign');

        $task->save();


        // redirect
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // delete
        $task = Task::find($id);
        $task->delete();

        // redirect
        return redirect('tasks');
    }
}
