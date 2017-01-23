<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Add a New Fee List'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add a New Fee List Items</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/fee/createlist" method="post">

                    <div class="form-group">
                        @if ($categorys->isEmpty())
                            <div class="panel-body">
                                <p> No Class available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Class</label>

                            <div class="col-sm-10">
                                <select name="category" class="select2" data-allow-clear="true"
                                        data-placeholder="Select a Class..." required>
                                    <option></option>
                                    @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        @if ($fees->isEmpty())
                            <div class="panel-body">
                                <p> No Fee Types created yet </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-2 control-label">Fee Types</label>

                            <div class="col-sm-10">
                                <select name="fee" class="select2" data-allow-clear="true"
                                        data-placeholder="Select a Fee Type..." required>
                                    <option></option>
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}">{{$fee->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-credit-card"></i>
                                </div>
                                <input type="text" name="amount" class="form-control" id="" placeholder="Amount"
                                       required>
                            </div>
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