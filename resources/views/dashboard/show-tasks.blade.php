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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr id='addr0'>
                                <td>
                                    {{$task->taskId}}
                                </td>
                                <td>
                                    {{$task->taskName}}
                                </td>
                                <td>
                                    {{$task->duration}}
                                </td>
                                <td>
                                    {{$task->start}}
                                </td>
                                <td>
                                    {{$task->finish}}

                                </td>

                            </tr>
                        @endforeach
                        <tr id='addr1'></tr>
                        </tbody>

                    </table>

                </div>


            </div>


        @else
        No Tasks
        @endif
    </div>
@endsection
