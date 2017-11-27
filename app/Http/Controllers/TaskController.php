<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        return view('task.index', ['tasks' => $tasks]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //view create view
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo Auth::user()->id;
       /*$task_save=Task::create([
                   'user_id' => $request->input('user_id') ,
                   'task_name' => $request->input('task_name') ,
                   'task_description' => $request->input('task_description')
       ]);*/

       $task = new Task; 

       $task->user_id = $request->input('user_id') ;
       $task->task_name = $request->input('task_name') ;
       $task->task_description = $request->input('task_description') ;
        

    if($task->save()){
        return redirect()->route('task.show', ['task' => $task->id])
               ->with('success', 'Task added successfully.');
    }

    return back()->withInput()->with('error', 'Error creating new task.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //show task details
        $task=Task::where('id', $task->id)->get();
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task=Task::find($task->id);
        return view('task.edit', ['task' => $task]);
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
        //update task
        
        $task_update=Task::where('id', $task->id)
                           ->update([
                                      'task_name' => $request->input('task_name'),
                                      'task_description' => $request->input('task_description')
                           ]);
       
       if($task_update){
            
            return redirect()->route('task.show', [$task->id])
            ->with('success', 'Task updated successfully');

       }

       return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //delete the task
        $task_del=Task::find($task->id);
        if($task_del->delete()){ 

            return redirect()->route('task.index')
                   ->with('success', 'Task delete successfully');
        }

        return back()->withInput->with('error', 'Task could not be deleted.');
    }
}
