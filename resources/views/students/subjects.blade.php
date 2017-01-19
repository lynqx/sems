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
                <form role="form" class="form-horizontal form-groups-bordered" action="/students/subject" method="post">

                @foreach($users as $user)
                    <h3>{{$user->fname}} {{$user->middlename}} {{$user->lname}}</h3>
                        <p class="label label-danger">{{$user->class}}</p>
                    <input type="text" name="student" value="{{$user->uid}}">

                @endforeach
                <hr>

                    <div class="panel-body">

                    @if ($core->isEmpty())
                            <p> Core Subjects not available for student's class </p>
                    @else
                            <h3> Core Subjects </h3>
                        <hr>
                            <ul class="icheck-list">
                                @foreach($core as $cor)
                                    <li>
                                        <input name="check[{{$cor->cid}}]" type="checkbox" class="icheck"
                                               id="minimal-checkbox-1"
                                               value="{{$cor->cid}}" checked disabled>
                                        <label for="minimal-checkbox-1">{{$cor->subject}}</label>
                                    </li>
                                @endforeach
                            </ul>
                    @endif

                        @if ($core->isEmpty())
                            <p> Compulsory Subjects not available for student's class </p>
                        @else
                            <h3> Compulsory Subjects </h3>
                            <hr>
                            <ul class="icheck-list">
                                @foreach($compulsory as $comp)
                                    <li>
                                        <input name="check[{{$comp->cid}}]" type="checkbox" class="icheck"
                                               id="minimal-checkbox-1"
                                               value="{{$comp->cid}}">
                                        <label for="minimal-checkbox-1">{{$comp->subject}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($required->isEmpty())
                            <p> Required Subjects not available for student's class </p>
                        @else
                            <h3> Required Subjects </h3>
                            <hr>
                            <ul class="icheck-list">
                                @foreach($required as $req)
                                    <li>
                                        <input name="check[{{$req->cid}}]" type="checkbox" class="icheck"
                                               id="minimal-checkbox-1"
                                               value="{{$req->cid}}">
                                        <label for="minimal-checkbox-1">{{$req->subject}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($elective->isEmpty())
                            <p> Elective Subjects not available for student's class </p>
                            <small> Select One of the following subjects</small>
                        @else
                            <h3> Elective Subjects </h3>
                            <hr>
                            <ul class="icheck-list">
                                @foreach($elective as $elect)
                                    <li>
                                        <input name="check[{{$elect->cid}}]" type="checkbox" class="icheck"
                                               id="minimal-checkbox-1"
                                               value="{{$elect->cid}}">
                                        <label for="minimal-checkbox-1">{{$elect->subject}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Register Subject</button>
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