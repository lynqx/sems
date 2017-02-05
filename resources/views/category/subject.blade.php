<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Subjects of'])
@section('content')


    <div class="row">
        <h3>Subjects of</h3>
        <br/>

        @if (empty($subjects))
            <div class="panel-body">
                <p> No subjects has been registered for this class </p>
            </div>
        @else
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


            <table class="table table-bordered datatable" id="table-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Criteria</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($subjects as $subject)
                    <tr class="odd gradeX">
                        <td>{{$subject->subjects}}</td>
                        <td>{{$subject->criteria}}</td>
                        <td>{{$subject->status}}</td>
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