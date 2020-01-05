<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources =  Resource::all();
        $types = array('Work' => 'Work', 'Cost' => 'Cost', 'Meterial' => 'Meterial');


        return view('dashboard.resource')->with('resources', $resources)->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $resources =  Resource::orderBy('id', 'asc')->get();
        return view('dashboard.show-resource')->with('resources', $resources);
    }
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
        $resource = new Resource();
        $resource->resourceName = 'Resource name';
        $resource->type = 'type';
        $resource->meterial = 'Meterial';
        $resource->max = 'Max';
        $resource->rate = 'Rate';
        $resource->ovt = 'ovt';
        $resource->cost = 'Cost';
        $resource->save();
        return redirect('/dash/resource');
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

        $resource = Resource::find($id);
        $resource->resourceName = $request->input('rname');
        $resource->type =  $request->input('type');
        $resource->meterial =  $request->input('meterial');
        $resource->max =  $request->input('max');
        $resource->rate =  $request->input('rate');
        $resource->ovt =  $request->input('ovt');
        $resource->cost =  $request->input('cost');
        $resource->save();
        return redirect('/dash/resource');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resource = Resource::find($id);
        $resource->delete();
        return redirect('/dash/resource');
    }
}
