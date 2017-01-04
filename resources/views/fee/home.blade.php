<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Fee Categories'])
@section('content')


    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">View All Fee Categories</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            @if ($fees->isEmpty())
                <div class="panel-body">
                    <p> No fees has been added for your school </p>
                </div>

            @else
                <table class="table table-bordered table-responsive">
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

    </div>
    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop