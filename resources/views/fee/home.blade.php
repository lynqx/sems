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
    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop