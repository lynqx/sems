<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Classes'])
@section('content')


    <div class="row">
        <h3>View All Classes</h3>

        <p class="text-right"><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');"
                                 class="btn btn-default btn-icon">
                Add New Class
                <i class="entypo-plus"></i>
            </a>
        </p>
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
        @if (empty($categories))
            <div class="panel-body">
                <p> No classes has been added for your school </p>
            </div>

        @else
            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->name}}</td>
                        {{--<td>{{$category->teacher}}  {{$category->teacher->lastname}}</td>--}}
                        <td>
                            @if($category->status == 1)
                                <p class="btn btn-info">Active</p>
                            @else
                                <p class="btn btn-default">Pending</p>
                            @endif
                        </td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <div class="btn-group left-dropdown">
                                <button type="button" class="btn btn-danger">Actions</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-info" role="menu">
                                    <li><a href="{{action('Category\StudentController@home', $category->id) }}"> View Students </a>
                                    </li>
                                    <li><a href="{{action('Category\SubjectController@home', $category->id) }}">
                                            View Subjects</a>
                                    </li>
                                    <li><a href="{{action('Students\SubjectController@home', $category->id) }}">
                                            View Timetable</a>
                                    </li>
                                    <li><a href="{{action('Category\UpdateController@home', $category->id) }}"> Edit </a>
                                    </li>
                                    <li><a href="#">Deactivate</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="javascript;"
                                           data-delete="{{$category->id}}">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{$category->id}}"
                                              action="{{ action('Category\DeleteController@index', $category->id) }}"
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


    <!-- Modal 1 (Basic)-->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add a New Class</h4>
                </div>

                <div class="modal-body">
                    <form id="create-form" role="form" class="form-horizontal" action="/category/create" method="post">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label">Class</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="category" class="form-control" id=""
                                               placeholder="Category Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label">Teachers</label>

                                    <div class="col-md-4">
                                        <select name="teacher" class="form-control"
                                                data-placeholder="Select one teacher...">

                                            <option></option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->firstname}}  {{$teacher->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" class="btn btn-info">Create New Class</button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <link rel="stylesheet" href="{{URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <script src="{{URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop