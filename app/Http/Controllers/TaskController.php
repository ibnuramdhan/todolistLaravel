<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $tasks = Task::with('user','task_details')->limit(20)->get();
        //dd($tasks);
        //return view('home',compact('tasks'));


        $user = User::with('tasks.task_details')->find(2);
        return response()->json($tasks);
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
    public function store(Request $request)
    {
        //
        // $task = new Task();
        // $task->user_id = Auth::user()->name;
        // $task->title = $request
        // $task->due_date = $request->due_date;
        // $task->save();
        $input = $request->all();
        $input ['user_id'] = Auth::id();
        Task::create($input);
        //$task->save();
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        //dd($task);
        return response()->json($task->task_details->first()->task->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $task->fill($request->all())->save();
        return redirect('/task/'.$task->task_id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Task::find($id)->delete();
        return redirect('/task');
    }

    public function getAllTask()
    {
        //
        $tasks=Task::all();
        return response()->json($tasks, 200);
    }
}
