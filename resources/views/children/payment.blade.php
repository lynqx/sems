<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 4:09 AM
 */
?>

@extends('layouts.main', ['page_title'=>'View all Students'])
@section('content')

    <div class="row">

        <div class="panel panel-default">
            <div class="panel-body">
                <form id="make-payment" role="form" class="form-horizontal">
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <h2>{{$child->firstname}} {{$child->lastname}}</h2>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Fee Type</label>

                        <div class="col-sm-5">
                            <select name="class" class="select2" required="required" data-allow-clear="true"
                                    data-placeholder="Select fee...">
                                <option></option>
                                @foreach($fee_types as $fee)
                                    <option value="{{$fee->id}}">{{$fee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-2" class="col-sm-2 control-label">Amount</label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    $
                                </div>
                                <input type="text" name="amount" class="form-control input-lg" placeholder="Amount"
                                       required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button id="make-payment" type="submit" class="btn btn-info btn-lg">Make Payment</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="email" value="{{  $parent->email  }}"/> {{-- required --}}
                            <input type="hidden" name="term" value="1st"/>
                            <input type="hidden" name="key" value="{{ config('paystack.public_key') }}"/> {{-- required --}}
                        </div>
                    </div>

                </form>


            </div>

        </div>
    </div>
    <script type="text/javascript" src="{!! asset('js/paystack/paystack.js') !!}"></script>
@stop