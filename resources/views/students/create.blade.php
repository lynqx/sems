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
            </div>

            <div class="panel-body">

                <form id="create-form" role="form" class="form-horizontal" action="/students/create" method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-2 control-label">Class</label>

                                <div class="col-sm-4">
                                    <select name="category" class="form-control select2" id=""
                                            data-size="1"
                                            data-placeholder="Select a Class..." required>
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <br/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">First Name</label>

                                <div class="col-sm-8">
                                    <input type="text" name="firstname" class="form-control" id=""
                                           placeholder="First Name"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Middle Name</label>

                                <div class="col-sm-8">
                                    <input type="text" name="middlename" class="form-control" id=""
                                           placeholder="Middle Name"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Last Name</label>

                                <div class="col-sm-8">
                                    <input type="text" name="lastname" class="form-control" id=""
                                           placeholder="Last Name"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-ta" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">
                            <textarea class="form-control" id="field-ta" placeholder="Address"
                                      name="address"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Email</label>

                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id=""
                                           placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Mobile Number</label>

                                <div class="col-sm-8">
                                    <input type="tel" name="mobile" class="form-control" id=""
                                           placeholder="Mobile Number"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Gender</label>

                                <div class="col-sm-8">
                                    <select name="gender" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select a Gender..." required>
                                        <option></option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-4 control-label">Marital Status</label>

                                <div class="col-sm-8">
                                    <select name="marital_status" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select a Status..." required>
                                        <option></option>
                                        @foreach($status as $mstat)
                                            <option value="{{$mstat->id}}">{{$mstat->status}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Date of Birth</label>

                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker"
                                               data-start-view="2" data-format="yyyy-mm-dd"
                                               name="date_of_birth" required>

                                        <div class="input-group-addon">
                                            <a href="#"><i class="entypo-calendar"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-5">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>

    <script type="text/javascript" src="{!! asset('js/students/create.js') !!}"></script>
@stop