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


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)
                            <tr id='addr0'>
                                <td>

                                    {{$resource->resourceName}}



                                </td>
                                <td>
                                    {{$resource->type}}
                                </td>
                                <td>
                                    {{$resource->meterial}}
                                </td>
                                <td>
                                    {{$resource->max}} %
                                </td>
                                <td>
                                    {{$resource->rate}} $/hr
                                </td>
                                <td>
                                    {{$resource->ovt}}

                                </td>
                                <td>
                                    {{$resource->cost}}

                                </td>

                            </tr>
                        @endforeach
                        <tr id='addr1'></tr>
                        </tbody>


                    </table>


                </div>


            </div>


        @else
     No Resources
        @endif
    </div>
@endsection
