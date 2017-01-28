<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>
@extends('layouts.main', ['page_title'=>$parent->firstname." ". $parent->middlename." ". $parent->lastname])
@section('content')

    <div class="row">

        <br/>

        <div class="col-md-9">

            <div class="panel minimal minimal-gray">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3>{{$parent->firstname}} {{$parent->middlename}} {{$parent->lastname}}</h3>
                    </div>
                    <div class="panel-options">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#profile-1" data-toggle="tab"><i class="entypo-menu"></i>
                                    Profile</a></li>
                            <li><a href="#profile-2" data-toggle="tab"><i class="entypo-book-open"></i> Child's Details</a>
                            </li>
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
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="v-home">
                                            <form role="form" class="form-horizontal form-groups-bordered"
                                                  action="/parents/edit" method="post">
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
                                                                   value="{{$parent->firstname}}" required>
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
                                                                   value="{{$parent->lastname}}" required>
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
                                                                   value="{{$parent->biodata->mobile}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    @if (empty($genders))
                                                        <div class="panel-body">
                                                            <p> No Genders available </p>
                                                        </div>
                                                    @else
                                                        <label for="field-2"
                                                               class="col-sm-2 control-label">Gender</label>

                                                        <div class="col-sm-4">
                                                            <select name="gender" class="form-control select2"
                                                                    data-allow-clear="true"
                                                                    data-placeholder="Select a Gender..." required>
                                                                <option></option>
                                                                @foreach($genders as $gender)
                                                                    <option value="{{$gender->id}}"
                                                                            {{isset($parent->biodata->gender->name) && $parent->biodata->gender->id == $gender->id ?"selected" : 'not set'}}>
                                                                        {{$gender->name}}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    @endif
                                                    @if (empty($status))
                                                        <div class="panel-body">
                                                            <p> No Marital Status available </p>
                                                        </div>
                                                    @else
                                                        <label for="field-2" class="col-sm-2 control-label">Marital
                                                            Status</label>
                                                        <div class="col-sm-4">
                                                            <select name="m_status" class="form-control select2"
                                                                    data-allow-clear="true"
                                                                    data-placeholder="Select a Status..." required>
                                                                <option></option>
                                                                @foreach($status as $mstat)
                                                                    <option value="{{$mstat->id}}"
                                                                            {{isset($parent->biodata->status) && $parent->biodata->status->id == $mstat->id ?"selected" : 'not set'}}>
                                                                        {{$mstat->status}}</option>
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
                                            </form>

                                        </div>
                                        <div class="tab-pane" id="v-profile">
                                            <div class="form-group">
                                                <label for="field-ta" class="col-sm-3 control-label">Textarea</label>

                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="field-ta"
                                                              placeholder="Textarea">{{$parent->biodata->address}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="tab-pane" id="profile-2">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="panel-title">Child's Details</div>

                                            <div class="panel-options">
                                                <a href="#sample-modal" data-toggle="modal"
                                                   data-target="#sample-modal-dialog-1" class="bg"><i
                                                            class="entypo-cog"></i></a>
                                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            @foreach($children as $child)
                                                <table class="table table-hover table-striped">
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-users"></i>Name of Child
                                                            :
                                                        </td>
                                                        <td> {{$child->fname}} {{$child->middlename}} {{$child->lname}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-menu"></i>Class :</td>
                                                        <td> {{$child->category->name}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-phone"></i>Mobile :</td>
                                                        <td> {{$child->biodata->mobile}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-mail"></i>Email :</td>
                                                        <td> {{$child->email}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-user"></i> Gender :</td>
                                                        <td> {{$child->biodata->gender->name}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><i class="entypo-calendar"></i>Date of
                                                            Birth :
                                                        </td>
                                                        <td> {{$child->biodata->date_of_birth}} </td>
                                                    </tr>
                                                </table>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
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
                        <h3>{{$parent->firstname}} {{$parent->middlename}} {{$parent->lastname}}</h3>
                        <hr>
                        <p class="btn btn-info">{{isset($parent->biodata) && isset($parent->biodata->gender) ? $parent->biodata->gender->name : 'not set'}}</p>

                        <p class="btn btn-info">{{isset($parent->biodata) ? $parent->biodata->date_of_birth : 'not set'}}</p>
                        <hr>
                        <h4><i class="entypo-mobile"></i> {{isset($parent->biodata) ? $parent->biodata->mobile : ''}}
                        </h4>
                        <hr>
                        <h4><i class="entypo-mail"></i> </span> {{$parent->email}} </h4>
                        <hr>
                        @foreach($children as $child)
                            <h4>Child's Name:<br> <i
                                        class="entypo-users"></i> {{$child->firstname}} {{$child->middlename}} {{$child->lastname}}
                            </h4>
                        @endforeach

                    </center>
                </div>

            </div>
        </div>


    </div>

    <link rel="stylesheet" href="{{URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <script src="{{URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop