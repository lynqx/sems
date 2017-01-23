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
        <div class="col-sm-3">

            <div class="tile-stats tile-primary">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="{{$students}}" data-duration="1500" data-delay="0">0</div>
                <h3>Total Students</h3>

                <p>Total Number of students registered in the school.</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-user-add"></i></div>
                <div class="num" data-start="0" data-end="{{$newstudents}}" data-duration="1500" data-delay="0">0</div>
                <h3>New Students</h3>

                <p>Number of students who joined the school this term.</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-user"></i></div>
                <div class="num" data-start="0" data-end="{{$teachers}}" data-duration="1500" data-delay="0">0</div>
                <h3>Teachers</h3>

                <p>Total Number of Teachers in the school.</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-book"></i></div>
                <div class="num">{{$subjects}}</div>

                <h3>Courses</h3>

                <p>Total Number of Courses offered in school</p>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Add an Event</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                    class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>

                    <div class="panel-body">
                        <form role="form" class="form-horizontal" action="#" method="post">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-2" class="col-sm-3 control-label">Event</label>

                                        <div class="col-sm-9">
                                            <input type="text" name="event" class="form-control" id=""
                                                   placeholder="Type an Event" required>
                                            <small> Character not more than 200 words</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-2" class="col-sm-3 control-label">Priority</label>

                                        <div class="col-md-9">
                                            <select name="teacher" class="form-control select2" data-allow-clear="true"
                                                    data-placeholder="Select one option">

                                                <option></option>
                                                <option value="1">Low</option>
                                                <option value="2">Mid</option>
                                                <option value="3">High</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-info">Create Event</button>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>


        <div class="col-sm-7">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Push Notification</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                    class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>

                <div class="panel-body">
                    Form for notifications here
                </div>
            </div>


        </div>

    </div>


    <div class="row">

        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Recent Payments</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                    class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>
                @if ($payments->isEmpty())
                    <div class="panel-body">
                        <p> No Payment yet this term </p>
                    </div>
                @else

                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->student_id}}</td>
                                    <td>{{$payment->student_id}}</td>
                                    <td>{{$payment->amount}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">TOTAL</td>
                                <td><h3><b>
                                    @foreach($totals as $total)
                                        {{$total->totalamount}}
                                    @endforeach
                                    </b></h3>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-sm-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Details of Last Term Defaulters</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                    class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>
                @if ($payments->isEmpty())
                    <div class="panel-body">
                        <p> No Payment yet this term </p>
                    </div>
                @else

                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Parent's Name</th>
                                <th>Parent's Mobile</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->course}}</td>
                                    <td>{{$payment->created_at}}</td>
                                    <td>{{$payment->created_at}}</td>
                                    <td>{{$payment->amount}}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>


    </div>
@stop