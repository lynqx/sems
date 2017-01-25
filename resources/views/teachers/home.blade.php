<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Teachers'])
@section('content')


    <div class="row">
        <h3>View All Teachers</h3>
        <br />

        <script type="text/javascript">
            jQuery( document ).ready( function( $ ) {
                var $table4 = jQuery( "#table-4" );

                $table4.DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                } );
            } );
        </script>

        @if ($teachers->isEmpty())
            <div class="panel-body">
                <p> No teachers has been added for your school </p>
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
                <th>Class</th>
                <th>Operations</th>
            </tr>
            </thead>

            <tbody>
            @foreach($teachers as $teacher)
            <tr class="odd gradeX">
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->firstname}} {{$teacher->middlename}} {{$teacher->lastname}}</td>
                <td>{{$teacher->email}}</td>
                <td>+234(0){{isset($teacher->biodata) ? $teacher->biodata->mobile :''}}</td>
                <td>{{isset($teacher->biodata) && isset($teacher->biodata->gender) ? $teacher->biodata->gender->name : 'not set'}}</td>
                <td>{{$teacher->class}}</td>
                <td><a href="{{action('Fee\UpdateController@home', $teacher->id) }}"
                       class="btn btn-success"> Edit </a>

                    <a href="javascript;"
                       class="btn btn-danger"
                       data-delete="{{$teacher->id}}">
                        Delete
                    </a>

                    <form id="delete-form-{{$teacher->id}}"
                          action="{{ action('Fee\DeleteController@index', $teacher->id) }}"
                          method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>

            @endforeach
            </tbody>

            <tfoot>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Operations</th>
            </tr>
            </tfoot>
        </table>
            @endif

    </div>


    <link rel="stylesheet" href="{{URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <script src="{{URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop