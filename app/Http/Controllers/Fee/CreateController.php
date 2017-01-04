<?php

namespace App\Http\Controllers\Fee;

use App\Http\Controllers\LayoutsMainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class CreateController extends LayoutsMainController
{
    public function home()
    {
        return View('fee.create');
    }


    public function saveCreate()
    {
        $fee = new Fee;
        $input = Input::all();
        $fee->name = $input['name'];
        $fee->status = '1';

        $validator = Validator::make($input,
            array(
                'name' => 'required|unique:fees,name|min:3'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('fee/create')->with('errors', $validator->messages());

        } else {
            $fee->save();

            return Redirect::action('Fee\IndexController@home');

        }
    }

}
