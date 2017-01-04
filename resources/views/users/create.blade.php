<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Create a New User'])
@section('content')


    <div class="row">

        @if(Session::has('errors'))
            <div class="alert alert-warning">
                @foreach(Session::get('errors')->all() as $error_message)
                    <p> {{$error_message }} </p>
                @endforeach
                </div>
        @endif

        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Create a New User</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

                <div class="panel-body">

                    {{--<form role="form" class="form-horizontal form-groups-bordered" action="/signup" method="post">--}}

                    {{--<div class="form-group">--}}
                        {{--<div class="col-sm-6">--}}
                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<i class="entypo-user"></i>--}}
                                {{--</div>--}}
                                {{--<input type="text" name="firstname" class="form-control" id="" placeholder="First Name" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-6">--}}
                            {{--<div class="input-group">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<i class="entypo-users"></i>--}}
                                {{--</div>--}}
                                {{--<input type="text" name="lastname" class="form-control" id="" placeholder="Last Name" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                        {{--@if ($categorys->isEmpty())--}}
                            {{--<div class="panel-body">--}}
                                {{--<p> No Classes created yet </p>--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="field-2" class="col-sm-3 control-label">Class</label>--}}

                                {{--<div class="col-sm-5">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<div class="input-group-addon">--}}
                                            {{--<i class="entypo-key"></i>--}}
                                        {{--</div>--}}

                                        {{--<select name="category" class="form-control" required >--}}
                                            {{--@foreach($categorys as $category)--}}
                                                {{--<option value="{{$category->cat_id}}">{{$category->category}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}


                        {{--@if ($lgas->isEmpty())--}}
                            {{--<div class="panel-body">--}}
                                {{--<p> No LGAs available </p>--}}
                            {{--</div>--}}
                        {{--@else--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="field-2" class="col-sm-3 control-label">Local Government</label>--}}

                            {{--<div class="col-sm-5">--}}
                                {{--<div class="input-group">--}}
                                    {{--<div class="input-group-addon">--}}
                                        {{--<i class="entypo-key"></i>--}}
                                    {{--</div>--}}

                                    {{--<select name="category" class="form-control" required >--}}
                                        {{--@foreach($lgas as $lga)--}}
                                        {{--<option>{{$lga->lga_name}}</option>--}}
                                        {{--@endforeach--}}
                                        {{--</select>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}


                        {{--<div class="form-group">--}}
                            {{--<div class="col-sm-offset-3 col-sm-5">--}}
                                {{--<button id="signup" type="submit" class="btn btn-info">Create Category</button>--}}
                                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}

                    <button id="signup" class="btn btn-info">Create Category</button>

                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}" />

                </div>

        </div>

    </div>

    <script type="text/javascript">
        var baseurl = '';

        $("#signup").click(function(){
            $.ajax({
                url: baseurl + '/signup',
                method: 'POST',
                dataType: 'json',
                data: {
                    firstname: "Akinjiola",
                    lastname: "Maya",
                    email: "makinjiola@gmail.com",
                    password: "maya1234",
                    "_token":$("#token").val()
                },
                error: function()
                {
                    alert("An error occoured!");
                },
                success: function(response)
                {
                    console.log(response);
                    alert("yay");
                }
            });
        });
    </script>
@stop