<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Add Sessions'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add Sessions</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/sessions/create" method="post">
                    <div class="alert alert-danger">
                        <p class="text-danger"><b>NOTE:</b> Adding a new session will de-activate all other previous
                            sessions</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Start Year</label>

                                <div class="col-md-9">
                                    <select name="start" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select start year...">
                                        <option></option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        {{--@for($i='2016'; $i='2050'; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor--}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">End Year</label>

                                <div class="col-md-9">
                                    <select name="end" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select end year...">

                                        <option></option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Term</label>

                                <div class="col-md-9">
                                    <select name="term" class="form-control select2" data-allow-clear="true"
                                            data-placeholder="Select a term...">

                                        <option></option>
                                        @foreach($terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Add Session</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>
@stop