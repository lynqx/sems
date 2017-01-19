<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'Add a New Book to the Library'])
@section('content')


    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Add a New Book to the Library</div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i
                                class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups-bordered" action="/library/create" method="post">

                    <div class="form-group">
                        @if ($categorys->isEmpty())
                            <div class="panel-body">
                                <p> No Book Category available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-1 control-label">Category</label>

                            <div class="col-sm-3">
                                <select name="category" class="select2" required="required" data-allow-clear="true"
                                        data-placeholder="Select a Class...">
                                    <option></option>
                                    @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->book_category}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif

                        <label for="field-2" class="col-sm-2 control-label">Book Title</label>

                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-book-open"></i>
                                </div>
                                <input type="text" name="title" class="form-control" id="" placeholder="Book Title"
                                       required>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">ISBN</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="isbn" class="form-control" id="" placeholder="ISBN Number"
                                       required>
                            </div>
                        </div>

                        <label for="field-2" class="col-sm-2 control-label">Edition</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="edition" class="form-control" id="" placeholder="Edition" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Author</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="author" class="form-control" id="" placeholder="Name of Author"
                                       required>
                            </div>
                        </div>

                        <label for="field-2" class="col-sm-2 control-label">Publisher</label>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="text" name="publisher" class="form-control" id=""
                                       placeholder="Name of Publisher" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-1 control-label">Copies</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input type="number" name="copies" class="form-control" id="" placeholder="Number of Copies">
                            </div>
                        </div>
                        <label for="field-2" class="col-sm-1 control-label">Shelf Number</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input type="text" name="shelf" class="form-control" id="" placeholder="Shelf Number"
                                       required>
                            </div>
                        </div>

                        <label for="field-2" class="col-sm-1 control-label">Book Position</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input type="text" name="position" class="form-control" id=""
                                       placeholder="Book Position" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="field-2" class="col-sm-1 control-label">Cost</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input type="text" name="cost" class="form-control" id="" placeholder="Cost of Book"
                                       required>
                            </div>
                        </div>

                        @if ($conditions->isEmpty())
                            <div class="panel-body">
                                <p> No Book Conditions available </p>
                            </div>
                        @else
                            <label for="field-2" class="col-sm-1 control-label">Book Conditions</label>

                            <div class="col-sm-3">
                                <select name="condition" class="select2" data-allow-clear="true"
                                        data-placeholder="Select a Condition..." required>
                                    <option></option>
                                    @foreach($conditions as $condition)
                                        <option value="{{$condition->id}}">{{$condition->condition}}</option>
                                    @endforeach
                                </select>

                            </div>
                        @endif

                        <label for="field-2" class="col-sm-1 control-label">Pictures</label>

                        <div class="col-sm-3">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-passport"></i>
                                </div>
                                <input type="file" name="avatar" class="form-control" id="">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </div>
@stop