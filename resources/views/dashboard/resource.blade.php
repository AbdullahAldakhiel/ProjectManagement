@extends('layout.app')
@include('inc.dashboardbar')

@section('content')
    <div class="container">
        @if(count($resources) > 0)

            <div class="row clearfix">
                <div class="col-md-12 column">
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                        <tr >
                            <th class="text-center">
                                Resource Name
                            </th>
                            <th class="text-center">
                                Type (List)
                            </th>
                            <th class="text-center">
                                Material
                            </th>
                            <th class="text-center">
                                Max (No. of Source)
                            </th>
                            <th class="text-center">
                                St.Rate
                            </th>
                            <th class="text-center">
                                Ovt.
                            </th>
                            <th class="text-center">
                                Cost/Use
                            </th>
                            <th class="text-center">
                                Save
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            {!! Form::open(['action' => ['ResourceController@update', $resource->id], 'method' => 'POST']) !!}
                            <tr id='addr0'>
                                <td>

                                    {{Form::text('rname',$resource->resourceName, ['class' => 'form-control', 'style' => 'width:150px'])}}



                                </td>
                                <td>
                                    {{Form::select('type', $types, $resource->type, ['class' => 'form-control', 'style' => 'width:100px'])}}
                                </td>
                                <td>
                                    {{Form::text('meterial',$resource->meterial, ['class' => 'form-control'])}}
                                </td>
                                <td>
                                    {{Form::text('max',$resource->max, ['class' => 'form-control'])}}
                                </td>
                                <td>
                                    {{Form::text('rate',$resource->rate, ['class' => 'form-control'])}}
                                </td>
                                <td>
                                    {{Form::text('ovt',$resource->ovt, ['class' => 'form-control'])}}

                                </td>
                                <td>
                                    {{Form::text('cost',$resource->cost, ['class' => 'form-control'])}}

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
                        {!! Form::open(['action' => 'ResourceController@store', 'method' => 'POST']) !!}
                        {{Form::submit('Add resource',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}

                        {!! Form::open(['action' => ['ResourceController@destroy', $resource->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Remove resource',['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}

                        <a href="/dash/show-resource"><button class="btn btn-dark">Show resources</button></a>
                    </table>


                </div>


            </div>


        @else
            {!! Form::open(['action' => 'ResourceController@store', 'method' => 'POST']) !!}
            {{Form::submit('Add resource',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        @endif
    </div>
@endsection
