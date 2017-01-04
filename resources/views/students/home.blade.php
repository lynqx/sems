<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Students'])
@section('content')


    <div class="row">
        <h3>View All Students</h3>
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

        @if ($users->isEmpty())
            <div class="panel-body">
                <p> No students has been added for your school </p>
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
            @foreach($users as $user)
            <tr class="odd gradeX">
                <td>{{$user->uid}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->class}}</td>
                <td><a href="{{action('Fee\UpdateController@home', $user->id) }}"
                       class="btn btn-success"> Edit </a>

                    <a href="javascript;"
                       class="btn btn-danger"
                       data-delete="{{$user->id}}">
                        Delete
                    </a>

                    <form id="delete-form-{{$user->id}}"
                          action="{{ action('Fee\DeleteController@index', $user->id) }}"
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
    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop