<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Timetable'])
@section('content')


    <div class="row">
        <h3>TIMETABLE</h3>
        <br/>

<h4>Monday</h4>
        <hr>
        @if (empty($mons))
            <div class="panel-body">
                <p> Empty Timetable for Monday </p>
            </div>
        @else
            <ul>
                @foreach($mons as $mon)
                    <li style="float:left; list-style: none; margin-right: 5px; width: 90px; border: 1px solid #cccccc; padding: 5px; -webkit-border-radius: 5px">
                        <h4>{{$mon->subject_id}}</h4>
                        <p class="label label-info">{{$mon->start_time}} - {{$mon->end_time}}</p>
                        <small>Name of Teacher</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <br>
        <br>
        <h4>Tuesday</h4>
        <hr>
        @if (empty($tues))
            <div class="panel-body">
                <p> Empty Timetable for Tuesday </p>
            </div>
        @else
            <ul>
                @foreach($tues as $tue)
                    <li style="float:left; list-style: none; margin-right: 5px; width: 90px; border: 1px solid #cccccc; padding: 5px; -webkit-border-radius: 5px">
                        <h4>{{$tue->subject_id}}</h4>
                        <p class="label label-default">{{$tue->start_time}} - {{$tue->end_time}}</p>
                        <small>Name of Teacher</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <br>
        <h4>Wednesday</h4>
        <hr>
        @if (empty($tues))
            <div class="panel-body">
                <p> Empty Timetable for Tuesday </p>
            </div>
        @else
            <ul>
                @foreach($tues as $tue)
                    <li style="float:left; list-style: none; margin-right: 5px; width: 90px; border: 1px solid #cccccc; padding: 5px; -webkit-border-radius: 5px">
                        <h4>{{$tue->subject_id}}</h4>
                        <p class="label label-info">{{$tue->start_time}} - {{$tue->end_time}}</p>
                        <small>Name of Teacher</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <br>
        <h4>Thursday</h4>
        <hr>
        @if (empty($tues))
            <div class="panel-body">
                <p> Empty Timetable for Tuesday </p>
            </div>
        @else
            <ul>
                @foreach($tues as $tue)
                    <li style="float:left; list-style: none; margin-right: 5px; width: 90px; border: 1px solid #cccccc; padding: 5px; -webkit-border-radius: 5px">
                        <h4>{{$tue->subject_id}}</h4>
                        <p class="label label-default">{{$tue->start_time}} - {{$tue->end_time}}</p>
                        <small>Name of Teacher</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <br>
        <h4>Friday</h4>
        <hr>
        @if (empty($tues))
            <div class="panel-body">
                <p> Empty Timetable for Tuesday </p>
            </div>
        @else
            <ul>
                @foreach($tues as $tue)
                    <li style="float:left; list-style: none; margin-right: 5px; width: 90px; border: 1px solid #cccccc; padding: 5px; -webkit-border-radius: 5px">
                        <h4>{{$tue->subject_id}}</h4>
                        <p class="label label-info">{{$tue->start_time}} - {{$tue->end_time}}</p>
                        <small>Name of Teacher</small>
                    </li>
                @endforeach
            </ul>
        @endif



    </div>

@stop