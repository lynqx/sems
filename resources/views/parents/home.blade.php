<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'List of Parents'])
@section('content')


    <div class="row">
        <h3>View All Parents</h3>
        <br/>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var $table4 = jQuery("#table-4");

                $table4.DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                });
            });
        </script>

        @if ($parents->isEmpty())
            <div class="panel-body">
                <p> No parents has been added for your school </p>
            </div>

        @else
            <table class="table table-bordered datatable" id="table-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach($parents as $parent)
                    <tr class="odd gradeX">
                        <td>{{$parent->id}}</td>
                        <td>{{$parent->firstname}} {{$parent->middlename}} {{$parent->lastname}}</td>
                        <td>{{$parent->email}}</td>
                        <td>+234(0){{isset($parent->biodata) ? $parent->biodata->mobile :''}}</td>
                        <td>{{isset($parent->biodata) && isset($parent->biodata->gender) ? $parent->biodata->gender->name : 'not set'}}</td>
                        <td>
                            <div class="btn-group left-dropdown">
                                <button type="button" class="btn btn-danger">Actions</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu dropdown-info" role="menu">
                                    <li><a href="{{action('Parents\ViewController@home', $parent->id) }}">View</a>
                                    </li>
                                    <li><a href="{{action('Parents\UpdateController@home', $parent->id) }}">Edit</a>
                                    </li>
                                    <li><a href="#">Deactivate</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="javascript;"
                                           data-delete="{{$parent->id}}">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{$parent->id}}"
                                              action="{{ action('Parents\DeleteController@index', $parent->id) }}"
                                              method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @endif

    </div>

    <link rel="stylesheet" href="{{URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <script src="{{URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>


    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop