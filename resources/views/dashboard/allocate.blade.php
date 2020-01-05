@extends('layout.app')
@include('inc.dashboardbar')

@section('content')
    <div class="container">
        @if(count($allocate) > 0)

            <div class="row clearfix">
                <div class="col-md-12 column">
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                        <tr >
                            <th class="text-center">
                                Task ID
                            </th>
                            <th class="text-center">
                                Task Name
                            </th>
                            <th class="text-center">
                                Duration
                            </th>
                            <th class="text-center">
                                Start (Date)
                            </th>
                            <th class="text-center">
                                Finish (Date)
                            </th>
                            <th class="text-center">
                                Resource Name
                            </th>
                            <th class="text-center">
                                Save
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allocate as $a)
                            {!! Form::open(['action' => ['AllocateController@update', $a->id], 'method' => 'POST']) !!}
                            <tr id='addr0'>
                                <td>
                                    {{$a->taskId}}
                                    {{Form::text('taskId', $a->taskId, ['hidden'])}}


                                </td>
                                <td>
                                    {{$a->taskName}}
                                </td>
                                <td>
                                    {{$a->duration}}
                                </td>
                                <td>
                                    {{$a->start}}
                                </td>
                                <td>
                                    {{$a->finish}}

                                </td>
                                <td>
                                    {{Form::select('resourceName', $resourcesName, $a->resourceName, ['class' => 'form-control'])}}

                                </td>
                                <td>

                                    {{Form::hidden('_method', 'PUT')}}
                                    {{Form::submit('   Save   ',['class' => 'btn-primary'])}}

                                    {!! Form::close() !!}



                                </td>
                            </tr>
                        @endforeach
                        <tr id='addr1'></tr>
                        </tbody>


                        {!! Form::open(['action' => ['AllocateController@destroy', $a->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Remove task',['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}

                        <a href="/dash/show-allocate"><button class="btn btn-dark">Show allocates</button></a>
                    </table>


                </div>


            </div>
            {!! Form::open(['action' => 'AllocateController@store', 'method' => 'POST']) !!}
            <div class="flex">
                {{Form::select('tname', $tasksName, 'Select', ['class' => 'form-control', 'style' => 'width:100px'])}}

                {{Form::submit('Add task',['class' => 'btn-primary'])}}
            </div>

            {!! Form::close() !!}

        @else
            {!! Form::open(['action' => 'AllocateController@store', 'method' => 'POST']) !!}
            <div class="flex">
                {{Form::select('tname', $tasksName, 'Select', ['class' => 'form-control', 'style' => 'width:100px'])}}

                {{Form::submit('Add task',['class' => 'btn-primary'])}}
            </div>

            {!! Form::close() !!}
        @endif
    </div>
@endsection
