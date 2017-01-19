<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Enter Results'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Enter Results</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="/students/subject" method="post">

                    <div class="panel-body">

                        <div class="form-group">
                            @if ($types->isEmpty())
                                <div class="panel-body">
                                    <p> No Exam type available for this school yet</p>
                                </div>
                            @else
                                <label for="field-2" class="col-sm-2 control-label">Exam Type</label>
                                <small> Select whether CA or exams</small>

                                <div class="col-sm-4">
                                    <select name="type" class="select2" data-allow-clear="true"
                                            data-placeholder="Select an Exam Type..." required>
                                        <option></option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->exam}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            @endif
                        </div>


                        @if ($subjects->isEmpty())
                            <p> No Subjects is available for selected student </p>
                        @else
                            <h3> Registered Subjects </h3>
                            <hr>
                            <ul class="icheck-list">
                                @foreach($subjects as $subject)
                                    <li>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <input name="check{{$subject->cid}}" type="checkbox" class="icheck"
                                                       id="minimal-checkbox-1"
                                                       value="{{$subject->cid}}">
                                                <label for="minimal-checkbox-1">{{$subject->subjects}}</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="entypo-book-open"></i>
                                                    </div>
                                                    <input type="number" name="result" class="form-control" id=""
                                                           placeholder="Enter Result..." required>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Post Result</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <hr>


        </div>

    </div>

    </div>
@stop