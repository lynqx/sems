<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View My Children'])
@section('content')


    <div class="row">
        <h3>Children</h3>
        @if ($users->isEmpty())
            <div class="panel-body">
                <p> No Child has been added to your account </p>
            </div>

        @else
            <table class="table table-bordered datatable" id="table-4">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>{{$user->uid}}</td>
                        <td>{{$user->fname}} {{$user->middlename}} {{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->class}}</td>
                        <td>
                            <div class="btn-group left-dropdown">
                                <button type="button" class="btn btn-danger">Actions</button>
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-info" role="menu">
                                    <li>
                                        <a href="{{action('Students\ViewController@home', $user->uid) }}">View</a>
                                    </li>
                                    <li>
                                        <a href="{{action('Children\PaymentController@home', $user->uid) }}">Make
                                            Payment</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @endif

    </div>

    <link rel="stylesheet" href="{{URL::asset('assets/js/datatables/datatables.css')}}">
    <script src="{{URL::asset('assets/js/datatables/datatables.js')}}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>

@stop