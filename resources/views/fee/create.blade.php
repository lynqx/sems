<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Add a New Fee Type'])
@section('content')


    <div class="row">

        @if(Session::has('errors'))
            <div class="alert alert-warning">
                @foreach(Session::get('errors')->all() as $error_message)
                    <p> {{$error_message }} </p>
                @endforeach
                </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add a New Fee Type</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" action="/fee/create" method="post">

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label">Fee Types</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input type="text" name="name" class="form-control" id="" placeholder="Fee Types" required>
                            </div>
                        </div>
                    </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">Submit</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>
                        </div>
                    </form>



                </div>

        </div>

    </div>
@stop