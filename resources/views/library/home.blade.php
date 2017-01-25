<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Books in Library'])
@section('content')


    <div class="row">
        <h3>View All Books</h3>
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

        @if ($librarys->isEmpty())
            <div class="panel-body">
                <p> No books in the school library yet. </p>
            </div>

        @else
            <script type="text/javascript">
                jQuery( document ).ready( function( $ ) {
                    var $table1 = jQuery( '#table-1' );

                    // Initialize DataTable
                    $table1.DataTable( {
                        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        "bStateSave": true
                    });

                    // Initalize Select Dropdown after DataTables is created
                    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                        minimumResultsForSearch: -1
                    });
                } );
            </script>

            <table class="table table-striped datatable" id="table-1">
                <thead>
                <tr>
                    <th data-hide="phone"></th>
                    <th></th>
                    <th data-hide="phone"></th>
                    <th data-hide="phone,tablet"></th>
                    <th></th>
                </tr>
                </thead>
            <tbody>
            @foreach($librarys as $library)
            <tr class="odd gradeX">
                <td><img src="{{URL::asset('assets/images/'.$library->avatar)}}" width="80" class="img-circle"/></td>
                <td colspan="2"><br><h3>{{$library->title}}</h3></td>
                <td></td>
                <td><h4 class="label label-info"><b>Author:</b> {{$library->author}}</h4><br>
                    <b>ISBN:</b> {{$library->isbn}}<br>
                        <b>Publisher:</b> {{$library->publisher}}
                </td>
                <td>
                    <div class="btn-group left-dropdown">
                        <button type="button" class="btn btn-danger">Actions</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-info" role="menu">
                            <li><a href="{{action('Students\ViewController@home', $library->uid) }}">View</a>
                            </li>
                            <li><a href="{{action('Students\UpdateController@home', $library->uid) }}">Edit</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="javascript;"
                                   data-delete="{{$library->uid}}">
                                    Delete
                                </a>

                                <form id="delete-form-{{$library->uid}}"
                                      action="{{ action('Students\DeleteController@index', $library->uid) }}"
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