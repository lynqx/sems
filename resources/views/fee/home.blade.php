<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Fee Types'])
@section('content')


    <div class="row">
        <h3>View All Fee Types</h3>

        <p class="text-right"><a href="javascript:;" onclick="jQuery('#modal-1').modal('show');"
                                 class="btn btn-default btn-icon">
                Add Fee Type
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

        @if ($fees->isEmpty())
            <div class="panel-body">
                <p> No fees has been added for your school </p>
            </div>

        @else
            <table class="table table-bordered datatable" id="table-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Fee Categories</th>
                    <th>Status</th>
                    <th>Date Added</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach($fees as $fee)
                    <tr>
                        <td>{{$fee->id}}</td>
                        <td>{{$fee->name}}</td>
                        <td>
                            @if($fee->status == 1)
                                <p class="btn btn-info">Active</p>
                            @else
                                <p class="btn btn-default">Pending</p>
                            @endif
                        </td>
                        <td>{{$fee->created_at}}</td>
                        <td><a href="{{action('Fee\UpdateController@home', $fee->id) }}"
                               class="btn btn-success"> Edit </a>

                            <a href="javascript;"
                               class="btn btn-danger"
                               data-delete="{{$fee->id}}">
                                Delete
                            </a>

                            <form id="delete-form-{{$fee->id}}"
                                  action="{{ action('Fee\DeleteController@index', $fee->id) }}"
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
                    <h4 class="modal-title">Add a New Fee Type</h4>
                </div>

                <div class="modal-body">
                    <form role="form" class="form-horizontal form-groups-bordered" action="/fee/create" method="post">

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Fee Types</label>

                            <div class="col-sm-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-key"></i>
                                    </div>
                                    <input type="text" name="name" class="form-control" id="" placeholder="Fee Types"
                                           required>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop