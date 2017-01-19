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
                                            <p>Carriage quitting securing be appetite it declared. High eyes kept so
                                                busy feel call in. Would day nor ask walls known. But preserved
                                                advantage are but and certainty earnestly enjoyment. Passage weather as
                                                up am exposed. And natural related man subject. Eagerness get situation
                                                his was delighted. </p>
                                        </div>
                                        <div class="tab-pane" id="v-profile">
                                            <p>Fulfilled direction use continual set him propriety continued. Saw met
                                                applauded favourite deficient engrossed concealed and her. Concluded boy
                                                perpetual old supposing. Farther related bed and passage comfort
                                                civilly. Dashwoods see frankness objection abilities the. As hastened oh
                                                produced prospect formerly up am. Placing forming nay looking old
                                                married few has. Margaret disposed add screened rendered six say his
                                                striking confined. </p>
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
                                            @foreach($students as $student)
                                                <table class="table table-hover table-striped">
                                                    <tr><td class="text-right"><i class="entypo-users"></i>Name of Child :</td><td> {{$student->fname}} {{$student->middlename}} {{$student->lname}}</td></tr>
                                                    <tr><td class="text-right"><i class="entypo-menu"></i>Class :</td><td> {{$student->class}} </td></tr>
                                                    <tr><td class="text-right"><i class="entypo-phone"></i>Mobile :</td><td> {{$student->mobile}} </td></tr>
                                                    <tr><td class="text-right"><i class="entypo-mail"></i>Email :</td><td> {{$student->email}} </td></tr>
                                                    <tr><td class="text-right"><i class="entypo-user"></i> Gender :</td><td> {{$student->sex}} </td></tr>
                                                    <tr><td class="text-right"><i class="entypo-calendar"></i>Date of Birth :</td><td> {{$student->dob}} </td></tr>

                                                    @foreach($teachers as $teacher)
                                                    <tr><td class="text-right"><i class="entypo-user"></i>Class Teacher :</td><td> {{$teacher->fname}} {{$teacher->lname}}
                                                        <p class="label label-info">{{$teacher->gender}}</p></td></tr>
                                                        @endforeach
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
                            @endforeach
                            @foreach($students as $student)
                                <h4>Child's Name:<br> <i
                                            class="entypo-users"></i> {{$student->fname}} {{$student->middlename}} {{$student->lname}}
                                </h4>
                            @endforeach

                        </center>
                    </div>

            </div>
        </div>


    </div>

    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop