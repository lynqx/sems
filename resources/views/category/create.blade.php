<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Create a New Class'])
@section('content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Create a New Class</div>
            </div>

            <div class="panel-body">

                <form id="create-form" role="form" class="form-horizontal" action="/category/create" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Class</label>

                                <div class="col-sm-4">
                                    <input type="text" name="category" class="form-control" id=""
                                           placeholder="Category Name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Teachers</label>

                                <div class="col-md-4">
                                    <select name="teacher" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select one teacher...">

                                        <option></option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->firstname}}  {{$teacher->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Create Category</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{!! asset('js/category/create.js') !!}"></script>
@stop