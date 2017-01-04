<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Edit Fee Category'])
@section('content')


    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Edit a Fee Category</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/fee/edit" method="post">

                    <input type="hidden" name="id" class="form-control" value="{{$id}}" required>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Fee Category</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input type="text" name="name" class="form-control" value="{{$name}}"
                                       placeholder="Fee Category" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Edit Fee</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>
@stop