<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Add Subjects to Class'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add Subjects to a Class</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/subjects/class" method="post">

                    <div class="form-group">
                        @if ($categorys->isEmpty())
                            <div class="panel-body">
                                <p> No Class available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Class</label>

                            <div class="col-sm-10">
                                <select name="class" class="form-control select2" required="required" data-allow-clear="true"
                                        data-placeholder="Select a Class...">
                                    <option></option>
                                    @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($subjects->isEmpty())
                            <div class="panel-body">
                                <p> No Class available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Subject</label>

                            <div class="col-sm-4">
                                <select name="subject" class="form-control select2" required="required" data-allow-clear="true"
                                        data-placeholder="Select a Subject...">
                                    <option></option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->course}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                        @if ($subjects->isEmpty())
                            <div class="panel-body">
                                <p> No Class available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Criteria</label>

                            <div class="col-sm-4">
                                <select name="criteria" class="form-control select2" required="required" data-allow-clear="true"
                                        data-placeholder="Select a Criteria ...">
                                    <option></option>
                                    @foreach($criteria as $crit)
                                        <option value="{{$crit->id}}">{{$crit->criteria}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif

                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Add Subject</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>
@stop