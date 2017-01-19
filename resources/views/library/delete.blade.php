<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Delete a Class'])
@section('content')


    <div class="row">

        @if(Session::has('errors'))
            <div class="alert alert-warning">
                @foreach(Session::get('errors')->all() as $error_message)
                    <p> {{$error_message }} </p>
                @endforeach
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><h3>Do you want to delete Category {{$category->category}}?</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/category/delete" method="post">

                    <div class="form-group">
                        <div class="col-sm-5">

                                <input type="hidden" name="cat_id" value="{{$category->cat_id}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-danger">Delete Category</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <a href="{{action('CategorysController@home')}}" class="btn btn-info"> No </a>
                        </div>
                    </div>
                </form>



            </div>

        </div>

    </div>

    <script type="text/javascript" src="{{ URL::asset('js/category/delete.js') }}"></script>
@stop