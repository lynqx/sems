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
                </div>
            </div>

        </div>
    </div>
@stop