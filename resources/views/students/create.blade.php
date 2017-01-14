<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Register A New Student'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add a New Student</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/students/create" method="post">

                    <div class="form-group">
                        @if ($categorys->isEmpty())
                            <div class="panel-body">
                                <p> No Class available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Class</label>

                            <div class="col-sm-10">
                                <select name="category" class="select2" data-allow-clear="true" data-placeholder="Select a Class..." required>
                                    <option></option>
                                    @foreach($categorys as $category)
                                        <option value="{{$category->cat_id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                        </div>
                    <hr>

                            <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">First Name</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="firstname" class="form-control" id="" placeholder="First Name"
                                       required>
                            </div>
                        </div>
                        <label for="field-2" class="col-sm-2 control-label">Middle Name</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="middlename" class="form-control" id="" placeholder="Middle Name"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Last Name</label>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-users"></i>
                                </div>
                                <input type="text" name="lastname" class="form-control" id="" placeholder="Last Name"
                                       required>
                            </div>
                        </div>
                        </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input type="email" name="email" class="form-control" id="" placeholder="Email Address" >
                            </div>
                        </div>
                        <label for="field-2" class="col-sm-2 control-label">Mobile Number</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input type="tel" name="mobile" class="form-control" id="" placeholder="Mobile Number"
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        @if ($genders->isEmpty())
                            <div class="panel-body">
                                <p> No Genders available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Gender</label>

                            <div class="col-sm-4">
                                    <select name="gender" class="select2" data-allow-clear="true" data-placeholder="Select a Gender..." required>
                                        <option></option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                        @endforeach
                                    </select>

                                </div>
                        @endif

                        @if ($status->isEmpty())
                            <div class="panel-body">
                                <p> No Marital Status available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Marital Status</label>

                            <div class="col-sm-4">
                                    <select name="m_status" class="select2" data-allow-clear="true"
                                            data-placeholder="Select a Status..." required>
                                        <option></option>
                                        @foreach($status as $mstat)
                                            <option value="{{$mstat->id}}">{{$mstat->status}}</option>
                                        @endforeach
                                    </select>

                                </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date of Birth</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" data-start-view="2" name="dob">

                                <div class="input-group-addon">
                                    <a href="#"><i class="entypo-calendar"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-2 control-label">Address</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" id="field-ta" placeholder="Address" name="address"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>
@stop