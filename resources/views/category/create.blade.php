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

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="/category/create" method="post">

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Class</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-newspaper"></i>
                                </div>
                                <input type="text" name="category" class="form-control" id="" placeholder="Category Name" required>
                            </div>
                        </div>
                    </div>

                        @if ($users->isEmpty())
                            <div class="panel-body">
                                <p> No Teachers available </p>
                            </div>
                        @else

                        <div class="form-group">
                            <label for="field-2" class="col-sm-3 control-label">Teachers</label>

                            <div class="col-md-9">
                                <div class="input-group">
                                    <select name="teacher" class="select2" data-allow-clear="true" data-placeholder="Select one teacher...">

                                        <option></option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->firstname}}  {{$user->lastname}}</option>
                                        @endforeach
                                        </select>

                                </div>
                            </div>
                        </div>
                        @endif


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Create Category</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>
                        </div>
                    </form>



                </div>

        </div>

    </div>
@stop