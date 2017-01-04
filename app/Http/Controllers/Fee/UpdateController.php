<?php

namespace App\Http\Controllers\Fee;

use App\Http\Controllers\LayoutsMainController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;
use Illuminate\Support\Facades\Validator;


class UpdateController extends LayoutsMainController
{
    public function home($slug)
    {
        $fee = Fee::findOrFail($slug);
        return View('fee.edit', $fee);
    }

    public function doEdit()
    {
        $fee = Fee::findOrFail(Input::get('id'));
        $input = Input::all();
        $fee->name = Input::get('name');

        $validator = Validator::make($input,
            array(
                'name' => 'required|min:3|unique:fees,name'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('fee')->with('errors', $validator->messages());

        } else {

        }
            if($fee->save()) {
                return Redirect::action('Fee\IndexController@home')->with('message', 'Fee categories edited successfully!');
            } else {
                return Redirect::action('Fee\IndexController@home')->with('message', 'The fee category could not be updated. Please try again!');
            }
    }

}