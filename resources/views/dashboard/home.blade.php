<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Dashboard'])
@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Recent Users</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
                <div class="panel-body">
                    This is your dashboard. You are logged in as {{$user->firstname}}. <br> Nothing here for now
                    @if(Auth::user()->hasRole('Teacher'))
                        <p>Yellow pawpaw</p>
                    @endif

                    <div class="col-sm-3">

                        <div class="tile-progress tile-red">
                            <div class="tile-header">
                                <h3>Students</h3>
                                <span>Total Number of students registered this term.</span>
                            </div>

                            <div class="tile-progressbar">
                                <span data-fill="{{$studentscount}}"></span>
                            </div>

                            <div class="tile-footer">
                                <h4>
                                    <span class="pct-counter">0</span> students
                                </h4>
                                <span>so far this term</span>
                            </div>
                        </div>

                        <div class="tile-progress tile-green">
                            <div class="tile-header">
                                <h3>New Students</h3>
                                <span>Number of students who joined the school this term.</span>
                            </div>

                            <div class="tile-progressbar">
                                <span data-fill="21"></span>
                            </div>

                            <div class="tile-footer">
                                <h4>
                                    <span class="pct-counter">0</span> students
                                </h4>

                                <span>Newly registered student this term alone</span>
                            </div>
                        </div>

                        <div class="tile-progress tile-aqua">
                            <div class="tile-header">
                                <h3>Outstanding Fees</h3>
                                <span>Total number of students who have not paid their school fees this term.</span>
                            </div>

                            <div class="tile-progressbar">
                                <span data-fill="89"></span>
                            </div>

                            <div class="tile-footer">
                                <h4>
                                    <span class="pct-counter">0</span> students
                                </h4>

                                <span>students have not paid this term</span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@stop