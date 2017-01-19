<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>
@foreach($users as $user)
    @extends('layouts.main', ['page_title'=>$user->fname." ". $user->middlename." ". $user->lname])
@section('content')


    <div class="row">

        <br/>

        <div class="col-md-9">

            <div class="panel minimal minimal-gray">

                <div class="panel-heading">
                    <div class="panel-title"><h3>{{$user->fname}} {{$user->middlename}} {{$user->lname}}</h3>
                        @endforeach
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

                                <div class="tabs-vertical-env">

                                    <ul class="nav tabs-vertical"><!-- available classes "right-aligned" -->
                                        <li class="active"><a href="#v-home" data-toggle="tab"><i
                                                        class="entypo-home"></i> Personal</a></li>
                                        <li><a href="#v-profile" data-toggle="tab"><i class="entypo-attach"></i>
                                                Contacts</a></li>
                                        <li><a href="#v-settings" data-toggle="tab"><i class="entypo-users"></i> Parents</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="v-home">
                                            <form role="form" class="form-horizontal form-groups-bordered"
                                                  action="/students/edit" method="post">
                                                @foreach($users as $user)

                                                    <div class="form-group">
                                                        <label for="field-2"
                                                               class="col-sm-2 control-label">Session</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                @foreach($sessions as $session)
                                                                    <input type="text" name="joindate"
                                                                           class="form-control" id=""
                                                                           placeholder="Session"
                                                                           value="{{$session->session}}" required
                                                                           readonly>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <label for="field-2" class="col-sm-2 control-label">Joining
                                                            Date</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="joindate" class="form-control"
                                                                       id="" placeholder="Joining Date"
                                                                       value="{{$user->created_at}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="field-2" class="col-sm-2 control-label">Reg
                                                            Number</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="reg_number"
                                                                       class="form-control" id=""
                                                                       placeholder="Registration Number"
                                                                       value="{{$user->reg_num}}" required readonly>
                                                            </div>
                                                        </div>

                                                        <label for="field-2"
                                                               class="col-sm-2 control-label">Class</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="class" class="form-control"
                                                                       id="" placeholder="Class"
                                                                       value="{{$user->class}}" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="field-2" class="col-sm-2 control-label">First
                                                            Name</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="firstname" class="form-control"
                                                                       id="" placeholder="First Name"
                                                                       value="{{$user->fname}}" required>
                                                            </div>
                                                        </div>
                                                        <label for="field-2" class="col-sm-2 control-label">Middle
                                                            Name</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="middlename"
                                                                       class="form-control" id=""
                                                                       placeholder="Middle Name"
                                                                       value="{{$user->middlename}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="field-2" class="col-sm-2 control-label">Last
                                                            Name</label>

                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-users"></i>
                                                                </div>
                                                                <input type="text" name="lastname" class="form-control"
                                                                       id="" placeholder="Last Name"
                                                                       value="{{$user->lname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="field-2"
                                                               class="col-sm-2 control-label">Email</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-mail"></i>
                                                                </div>
                                                                <input type="email" name="email" class="form-control"
                                                                       id="" placeholder="Email Address"
                                                                       value="{{$user->email}}">
                                                            </div>
                                                        </div>
                                                        <label for="field-2" class="col-sm-2 control-label">Mobile
                                                            Number</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-phone"></i>
                                                                </div>
                                                                <input type="tel" name="mobile" class="form-control"
                                                                       id="" placeholder="Mobile Number"
                                                                       value="{{$user->mobile}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        @if ($genders->isEmpty())
                                                            <div class="panel-body">
                                                                <p> No Genders available </p>
                                                            </div>
                                                        @else
                                                            <label for="field-2"
                                                                   class="col-sm-2 control-label">Gender</label>

                                                            <div class="col-sm-4">
                                                                <select name="gender" class="select2"
                                                                        data-allow-clear="true"
                                                                        data-placeholder="Select a Gender..." required>
                                                                    <option></option>
                                                                    @foreach($genders as $gender)
                                                                        <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        @endif

                                                        @if ($status->isEmpty())
                                                            <div class="panel-body">
                                                                <p> No Marital Status available </p>
                                                            </div>
                                                        @else
                                                            <label for="field-2" class="col-sm-2 control-label">Marital
                                                                Status</label>

                                                            <div class="col-sm-4">
                                                                <select name="m_status" class="select2"
                                                                        data-allow-clear="true"
                                                                        data-placeholder="Select a Status..." required>
                                                                    <option></option>
                                                                    @foreach($status as $mstat)
                                                                        <option value="{{$mstat->id}}">{{$mstat->status}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Date of Birth</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker"
                                                                       data-start-view="2" name="dob"
                                                                       value="{{$user->dob}}">

                                                                <div class="input-group-addon">
                                                                    <a href="#"><i class="entypo-calendar"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-5">
                                                            <button type="submit" class="btn btn-info">Update Record
                                                            </button>
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}"/>
                                                        </div>
                                                    </div>

                                            </form>

                                        </div>
                                        <div class="tab-pane" id="v-profile">
                                            <form role="form" class="form-horizontal form-groups-bordered"
                                                  action="/students/edit" method="post">
                                                <div class="form-group">
                                                    <label for="field-ta" class="col-sm-2 control-label">Present
                                                        Address</label>

                                                    <div class="col-sm-4">
                                                    <textarea class="form-control" id="field-ta"
                                                              placeholder="Present Address"
                                                              name="address">{{$user->present_address}}</textarea>
                                                    </div>

                                                    <label for="field-ta" class="col-sm-2 control-label">Permanent
                                                        Address</label>

                                                    <div class="col-sm-4">
                                                    <textarea class="form-control" id="field-ta"
                                                              placeholder="Permanent Address"
                                                              name="address">{{$user->perm_address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="field-2" class="col-sm-2 control-label">City</label>

                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="entypo-user"></i>
                                                            </div>
                                                            <input type="text" name="reg_number" class="form-control"
                                                                   id=""
                                                                   placeholder="City" value="{{$user->city}}" required>
                                                        </div>
                                                    </div>

                                                    <label for="field-2"
                                                           class="col-sm-2 control-label">State</label>

                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="entypo-user"></i>
                                                            </div>
                                                            <input type="text" name="class" class="form-control"
                                                                   id="" placeholder="State"
                                                                   value="{{$user->state}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-5">
                                                        <button type="submit" class="btn btn-info">Update Contact Record
                                                        </button>
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endforeach

                                        <div class="tab-pane" id="v-settings">
                                            <form role="form" class="form-horizontal form-groups-bordered"
                                                  action="/students/edit" method="post">
                                                @foreach($parents as $parent)

                                                    <div class="form-group">
                                                        <label for="field-2" class="col-sm-2 control-label">First
                                                            Name</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="firstname" class="form-control"
                                                                       id="" placeholder="First Name"
                                                                       value="{{$parent->fname}}" required>
                                                            </div>
                                                        </div>
                                                        <label for="field-2" class="col-sm-2 control-label">Middle
                                                            Name</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-user"></i>
                                                                </div>
                                                                <input type="text" name="middlename"
                                                                       class="form-control" id=""
                                                                       placeholder="Middle Name"
                                                                       value="{{$parent->middlename}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="field-2" class="col-sm-2 control-label">Last
                                                            Name</label>

                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-users"></i>
                                                                </div>
                                                                <input type="text" name="lastname" class="form-control"
                                                                       id="" placeholder="Last Name"
                                                                       value="{{$parent->lname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="field-2"
                                                               class="col-sm-2 control-label">Email</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-mail"></i>
                                                                </div>
                                                                <input type="email" name="email" class="form-control"
                                                                       id="" placeholder="Email Address"
                                                                       value="{{$parent->email}}">
                                                            </div>
                                                        </div>
                                                        <label for="field-2" class="col-sm-2 control-label">Mobile
                                                            Number</label>

                                                        <div class="col-sm-4">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="entypo-phone"></i>
                                                                </div>
                                                                <input type="tel" name="mobile" class="form-control"
                                                                       id="" placeholder="Mobile Number"
                                                                       value="{{$parent->mobile}}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        @if ($genders->isEmpty())
                                                            <div class="panel-body">
                                                                <p> No Genders available </p>
                                                            </div>
                                                        @else
                                                            <label for="field-2"
                                                                   class="col-sm-2 control-label">Gender</label>

                                                            <div class="col-sm-4">
                                                                <select name="gender" class="select2"
                                                                        data-allow-clear="true"
                                                                        data-placeholder="Select a Gender..." required>
                                                                    <option></option>
                                                                    @foreach($genders as $gender)
                                                                        <option value="{{$gender->id}}"
                                                                                selected="{{$parent->gender}}">{{$gender->gender}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        @endif

                                                        @if ($status->isEmpty())
                                                            <div class="panel-body">
                                                                <p> No Marital Status available </p>
                                                            </div>
                                                        @else
                                                            <label for="field-2" class="col-sm-2 control-label">Marital
                                                                Status</label>

                                                            <div class="col-sm-4">
                                                                <select name="m_status" class="select2"
                                                                        data-allow-clear="true"
                                                                        data-placeholder="Select a Status..." required>
                                                                    <option></option>
                                                                    @foreach($status as $mstat)
                                                                        <option value="{{$mstat->id}}"
                                                                                selected="{{$parent->sex}}">{{$mstat->status}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-3 col-sm-5">
                                                            <button type="submit" class="btn btn-info">Update Record
                                                            </button>
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}"/>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </form>

                                        </div>
                                    </div>

                                </div>

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
                                            @if ($fees->isEmpty())
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
                                                                       value="{{$user->uid}}"/>
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
                                        @if ($subjects->isEmpty())
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
                                        @if($teachers->isEmpty())
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
                                                        <h3>{{$teacher->fname}} {{$teacher->middlename}} {{$teacher->lname}}</h3>

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
                @foreach($users as $user)
                    <div class="panel-body">
                        <center>
                            <div class="lockscreen-thumb">
                                <img src="{{URL::asset('assets/images/lockscreen-user.png')}}" width="140"
                                     class="img-circle"/>

                            </div>
                            <h3>{{$user->fname}} {{$user->middlename}} {{$user->lname}}</h3>
                            <hr>
                            <p class="btn btn-info">{{$user->gender}}</p>

                            <p class="btn btn-info">{{$user->dob}}</p>
                            <hr>
                            <h4><i class="entypo-mobile"></i> {{$user->mobile}} </h4>
                            <hr>
                            <h4><i class="entypo-mail"></i> </span> {{$user->email}} </h4>
                            <hr>
                            <h4><i class="entypo-folder"></i> {{$user->category}} </h4>

                        </center>
                    </div>

            </div>
        </div>
        @endforeach


    </div>

    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop