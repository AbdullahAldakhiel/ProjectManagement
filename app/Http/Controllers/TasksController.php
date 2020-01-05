<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks =  Tasks::orderBy('taskId', 'asc')->get();
        return view('dashboard.tasks')->with('tasks', $tasks);
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

 public function report()
    {
        $tasks =  Tasks::orderBy('taskId', 'asc')->get();
        return view('dashboard.show-tasks')->with('tasks', $tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tmp = Tasks::latest()->first();
        if($tmp != null){
            $taskId = (int)$tmp->taskId+1;
            $taskId = (string)$taskId;
        }else{
            $taskId = '1';
        }

        $tasks = new Tasks();
        $tasks->taskId = $taskId;
        $tasks->taskName = 'Task name';
        $tasks->duration = 'Duration';
        $tasks->start = '1111-05-30';
        $tasks->finish = '1111-05-30';
        $tasks->save();
        return redirect('/dash/tasks');
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
       $tasks = Tasks::find($id);
       return $tasks;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $tasks = Tasks::find($id);
        $tasks->taskId = $request->input('taskId');
        $tasks->taskName =  $request->input('taskName');
        $tasks->duration =  $request->input('duration');
        $tasks->start =  $request->input('start');
        $tasks->finish =  $request->input('finish');
        $tasks->save();
        return redirect('/dash/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Tasks::find($id);
        $tasks->delete();
        return redirect('/dash/tasks');
    }
}
