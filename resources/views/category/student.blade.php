<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Students in {{$class->name}}'])
@section('content')


    <div class="row">
        <h3>Students in {{$class->name}}</h3>
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

        @if (empty($students))
            <div class="panel-body">
                <p> No students has been added for this class </p>
            </div>

        @else
            <table class="table table-bordered datatable" id="table-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach($students as $student)
                    <tr class="odd gradeX">
                        <td>{{$student->id}}</td>
                        <td>{{$student->firstname}} {{$student->middlename}} {{$student->lastname}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{isset($student->biodata) && isset($student->biodata->gender) ?$student->biodata->gender->name : 'not set'}}</td>
                        <td>{{isset($student->category) ? $student->category->name:'not set'}}</td>
                        <td>
                            <div class="btn-group left-dropdown">
                                <button type="button" class="btn btn-danger">Actions</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu dropdown-info" role="menu">
                                    <li><a href="{{action('Students\ViewController@home', $student->id) }}">View</a>
                                    </li>
                                    <li><a href="{{action('Students\UpdateController@home', $student->id) }}">Edit</a>
                                    </li>
                                    <li><a href="{{action('Students\SubjectController@home', $student->id) }}">Register
                                            Subjects</a>
                                    </li>
                                    <li><a href="{{action('Students\ResultController@home', $student->id) }}">Post
                                            Results</a>
                                    </li>
                                    <li><a href="#">Deactivate</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="javascript;"
                                           data-delete="{{$student->id}}">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{$student->id}}"
                                              action="{{ action('Students\DeleteController@index', $student->id) }}"
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