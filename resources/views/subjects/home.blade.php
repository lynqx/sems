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

        <p class="text-right"><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');"
                                 class="btn btn-default btn-icon">
                Add Subject
                <i class="entypo-plus"></i>
            </a>
        </p>
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
                            <td>{{$subject->name}}</td>
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

    <!-- Modal 1 (Basic)-->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add a New Subject</h4>
                </div>

                <div class="modal-body">
                    <form role="form" class="form-horizontal form-groups-bordered" action="/subjects/create" method="post">

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Subject</label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-newspaper"></i>
                                    </div>
                                    <input type="text" name="subject" class="form-control" id="" placeholder="Subject Name"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Add Subject</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
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

    <script type="text/javascript" src="{{ URL::asset('js/subjects/delete.js') }}"></script>
@stop