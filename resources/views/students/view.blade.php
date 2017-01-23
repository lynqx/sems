<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>
@extends('layouts.main', ['page_title'=>$user->firstname." ". $user->middlename." ". $user->lastname])
@section('content')


    <div class="row">

        <br/>

        <div class="col-md-9">

            <div class="panel minimal minimal-gray">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h3>
                    </div>
                    <div class="panel-options">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile-1" data-toggle="tab"><i class="entypo-menu"></i>
                                    Profile</a></li>
                            <li><a href="#profile-2" data-toggle="tab"><i class="entypo-book-open"></i> Details</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="profile-1">
                            <div class="col-md-12">


                            </div>
                        </div>

                        <div class="tab-pane" id="profile-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">School Fees</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal"
                                                   data-target="#sample-modal-dialog-1" class="bg"><i
                                                            class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            @if (empty($fees))
                                                <div class="panel-body">
                                                    <p> No Invoice for this students available, Please contact the
                                                        school for further details</p>
                                                </div>
                                            @else

                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Fee Categories</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($fees as $fee)
                                                        <tr>
                                                            <td>{{$fee->fee_type}}</td>
                                                            <td>{{$fee->amount}}</td>
                                                        </tr>

                                                    @endforeach
                                                    <form role="form" class="form-horizontal form-groups-bordered"
                                                          action="/fee/pay" method="post">
                                                        <tr>
                                                            <td> TOTAL</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">
                                                                            <i class="entypo-newspaper"></i>
                                                                        </div>
                                                                        @foreach($totals as $total)
                                                                            <input type="number" name="amount"
                                                                                   class="form-control"
                                                                                   value="{{$total->totalamount}}"
                                                                                   required
                                                                                   readonly>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Installments</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon">
                                                                            <i class="entypo-newspaper"></i>
                                                                        </div>
                                                                        <input type="number" name="amount"
                                                                               class="form-control"
                                                                               placeholder="Installmental Payment"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <small> If installmental field is empty, system assumes
                                                                    you
                                                                    are paying the total amount
                                                                </small>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="hidden" name="student"
                                                                       value="{{$user->id}}"/>
                                                                <button type="submit" class="btn btn-danger btn-block">
                                                                    Pay
                                                                    Invoice
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                    </tbody>
                                                </table>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">Subjects</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal"
                                                   data-target="#sample-modal-dialog-1" class="bg"><i
                                                            class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                        @if (empty($subjects))
                                            <div class="panel-body">
                                                <p> This student has not enrolled for any subject yet </p>
                                            </div>
                                        @else
                                            <div class="panel-body">
                                                <ul>
                                                    @foreach($subjects as $subject)
                                                        <li>{{$subject->course}} </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">Class Teacher</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal"
                                                   data-target="#sample-modal-dialog-1" class="bg"><i
                                                            class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>
                                        @if(empty($teachers))
                                            <div class="panel-body">
                                                <p> Class Teacher not available for this student yet </p>
                                            </div>
                                        @else
                                            @foreach($teachers as $teacher)
                                                <div class="panel-body">
                                                    <center>
                                                        <div class="lockscreen-thumb">
                                                            <img src="{{URL::asset('assets/images/lockscreen-user.png')}}"
                                                                 width="140"
                                                                 class="img-circle"/>

                                                        </div>
                                                        <h3>{{$teacher->firstname}} {{$teacher->middlename}} {{$teacher->lastname}}
                                                            <p class="label label-info"
                                                               style="font-size:10px">{{$teacher->gender}}</p></h3>

                                                        <h4><i class="entypo-phone"></i> {{$teacher->mobile}} </h4>
                                                        <hr>
                                                        <h4><i class="entypo-mail"></i> </span> {{$teacher->email}}
                                                        </h4>

                                                    </center>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">Recent Test</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal"
                                                   data-target="#sample-modal-dialog-1" class="bg"><i
                                                            class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            Most recent Test / Exam taken here with results
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Biodata</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                    class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <center>
                        <div class="lockscreen-thumb">
                            <img src="{{URL::asset('assets/images/lockscreen-user.png')}}" width="140"
                                 class="img-circle"/>

                        </div>
                        <h3>{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</h3>
                        <hr>
                        <p class="btn btn-info">{{$user->gender}}</p>

                        <p class="btn btn-info">{{$user->dob}}</p>
                        <hr>
                        <h4><i class="entypo-mobile"></i> {{$user->biodata->mobile}} </h4>
                        <hr>
                        <h4><i class="entypo-mail"></i> </span> {{$user->email}} </h4>
                        <hr>
                        <h4><i class="entypo-folder"></i> {{$user->category}} </h4>

                    </center>
                </div>

            </div>
        </div>


    </div>

    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop