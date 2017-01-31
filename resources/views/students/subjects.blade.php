<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Register for Subjects'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Register Subjects</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <form id="register-form" role="form" class="form-horizontal form-groups-bordered"
                      action="/students/subject" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h3>

                            <p class="label label-danger">{{$user->category->name}}</p>
                            <input type="hidden" name="student" value="{{$user->id}}">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Courses</label>

                                <div id="course-box" class="col-sm-8"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-offset-4 col-sm-8">
                                    <div class="input-group">
                                        <input id="api_token" type="hidden" value="{{Auth::user()->api_token}}"/>
                                        <select id="selected-course" class="form-control select2">
                                            @foreach($courses as $course)
                                                <option value="{{$course->id}}"
                                                        data-course-type="{{$course->criteria->name}}">
                                                    {{$course->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-btn">
                                            <button id="add-course" class="btn btn-green" type="button">
                                                <i class="entypo-check"></i>
                                            </button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Register Subject</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>

    </div>

    <script type="text/javascript" src="{!! asset('js/students/subject.js') !!}"></script>
@stop