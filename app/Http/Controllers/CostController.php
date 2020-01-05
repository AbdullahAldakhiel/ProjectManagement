<?php

namespace App\Http\Controllers;

use App\Allocate;
use Illuminate\Http\Request;
use DB;
class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalCost()
    {
        $cost =  Allocate::orderBy('id', 'asc')->get();
        $count = 0;
        if(count($cost) > 0){
            foreach ($cost as $a){
                $tmp = DB::table('Tasks')->where([
                    ['taskName', '=', $a->taskName],
                ])->first();
                $tmp2 = DB::table('resources')->where([
                    ['resourceName', '=', $a->resourceName],
                ])->first();

                $a->taskId = $tmp->taskId;
                $a->duration = $tmp->duration;
                $a->start = $tmp->start;
                $a->finish = $tmp->finish;

                $a->rate = $tmp2->rate;
                $a->ovt = $tmp2->ovt;
                $a->cost = (int)$a->rate * ((int)$a->duration * 8);
                $count+= $a->cost;
            }
        }

        return view('dashboard.total-cost')->with('cost', $cost)->with('count', ($count));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskCost()
    {
        $cost =  Allocate::orderBy('id', 'asc')->get();
        if(count($cost) > 0){
            foreach ($cost as $a){
                $tmp = DB::table('Tasks')->where([
                    ['taskName', '=', $a->taskName],
                ])->first();
                $tmp2 = DB::table('resources')->where([
                    ['resourceName', '=', $a->resourceName],
                ])->first();

                $a->taskId = $tmp->taskId;
                $a->duration = $tmp->duration;
                $a->start = $tmp->start;
                $a->finish = $tmp->finish;

                $a->rate = $tmp2->rate;
                $a->ovt = $tmp2->ovt;
                $a->cost = (int)$a->rate * ((int)$a->duration * 8);
            }
        }

        return view('dashboard.task-cost')->with('cost', $cost);
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
        //
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
    }
}
