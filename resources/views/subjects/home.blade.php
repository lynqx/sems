<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Subjects'])
@section('content')


    <div class="row">
        <h3>View All Subjects</h3>
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
            @if ($subjects->isEmpty())
                <div class="panel-body">
                    <p> No Subjects has been added for your school </p>
                </div>

            @else
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Subjects</th>
                        <th>Date Added</th>
                        <th>Operations</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{$subject->id}}</td>
                            <td>{{$subject->course}}</td>
                            <td>{{$subject->created_at}}</td>
                            <td><a href="{{action('Subjects\UpdateController@home', $subject->id) }}"
                                   class="btn btn-success"> Edit </a>

                                <a href="javascript;"
                                   class="btn btn-danger"
                                   data-delete="{{$subject->id}}">
                                    Delete
                                </a>

                                <form id="delete-form-{{$subject->id}}"
                                      action="{{ action('Subjects\DeleteController@index', $subject->id) }}"
                                      method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
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

    <script type="text/javascript" src="{{ URL::asset('js/subjects/delete.js') }}"></script>
@stop