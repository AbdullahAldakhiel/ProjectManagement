<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;
use App\Allocate;
use App\Tasks;
use DB;

class AllocateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocate = Allocate::all();
        $resources =  Resource::all();
        $tasks =  Tasks::orderBy('taskId', 'asc')->get();

        $tasksName =  $tasks->pluck('taskName', 'taskName')->toArray();
        $resourcesName = array('Select Resource') +$resources->pluck('resourceName', 'resourceName')->toArray();
        $showList = array();
        if(count($allocate) > 0){
            foreach ($allocate as $a){
                $tmp = DB::table('Tasks')->where([
                    ['taskName', '=', $a->taskName],
                ])->first();


                $a->taskId = $tmp->taskId;
                $a->duration = $tmp->duration;
                $a->start = $tmp->start;
                $a->finish = $tmp->finish;
            }
        }


//        return $allocate;
        return view('dashboard.allocate', compact('resources', 'tasks', 'tasksName', 'resourcesName', 'allocate'));
        //
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
        $allocate =  Allocate::orderBy('id', 'asc')->get();
        if(count($allocate) > 0){
            foreach ($allocate as $a){
                $tmp = DB::table('Tasks')->where([
                    ['taskName', '=', $a->taskName],
                ])->first();


                $a->taskId = $tmp->taskId;
                $a->duration = $tmp->duration;
                $a->start = $tmp->start;
                $a->finish = $tmp->finish;
            }
        }

        return view('dashboard.show-allocate')->with('allocate', $allocate);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allocate = new Allocate();
        $allocate->taskName = $request->input('tname');
        $allocate->resourceName = '';
        $allocate->save();
        return redirect('/dash/allocate');
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
        $allocate = Allocate::find($id);
        $allocate->resourceName =  $request->input('resourceName');
        $allocate->save();
        return redirect('/dash/allocate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $allocate = Allocate::find($id);
        $allocate->delete();
        return redirect('/dash/allocate');
    }
}
