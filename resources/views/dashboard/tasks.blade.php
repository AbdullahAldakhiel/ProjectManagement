@extends('layout.app')
@include('inc.dashboardbar')

@section('content')
    <div class="container">
    @if(count($tasks) > 0)

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
                               Save
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            {!! Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST']) !!}
                        <tr id='addr0'>
                            <td>
                                {{$task->taskId}}
                                {{Form::text('taskId', $task->taskId, ['hidden'])}}


                            </td>
                            <td>
                                {{Form::text('taskName',$task->taskName, ['class' => 'form-control'])}}
                            </td>
                            <td>
                                {{Form::text('duration',$task->duration, ['class' => 'form-control'])}}
                            </td>
                            <td>
                                {{Form::text('start',$task->start, ['class' => 'form-control'])}}
                            </td>
                            <td>
                                {{Form::text('finish',$task->finish, ['class' => 'form-control'])}}

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
                        {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
                        {{Form::submit('Add task',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}

                        {!! Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Remove task',['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}

                       <a href="/dash/show-tasks"><button class="btn btn-dark">Show reports</button></a>
                    </table>


                </div>


        </div>


    @else
        {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
        {{Form::submit('Add row',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    @endif
    </div>
@endsection
