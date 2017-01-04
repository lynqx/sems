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
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">View All Classes</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
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

    </div>
    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop