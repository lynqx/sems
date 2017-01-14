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
            @if ($categorys->isEmpty())
                <div class="panel-body">
                    <p> No classes has been added for your school </p>
                </div>

            @else
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Categories</th>
                        <th>Teachers</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Operations</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categorys as $category)
                        <tr>
                            <td>{{$category->categories_id}}</td>
                            <td>{{$category->category}}</td>
                            <td>{{$category->fname}}  {{$category->lname}}</td>
                            <td>
                                @if($category->status == 1)
                                    <p class="btn btn-info">Active</p>
                                @else
                                    <p class="btn btn-default">Pending</p>
                                @endif
                            </td>
                            <td>{{$category->created_at}}</td>
                            <td><a href="{{action('Category\UpdateController@home', $category->categories_id) }}"
                                   class="btn btn-success"> Edit </a>

                                <a href="javascript;"
                                   class="btn btn-danger"
                                   data-delete="{{$category->categories_id}}">
                                    Delete
                                </a>

                                <form id="delete-form-{{$category->categories_id}}"
                                      action="{{ action('Category\DeleteController@index', $category->categories_id) }}"
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