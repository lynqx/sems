<?php

namespace App\Http\Controllers\Fee;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\FeeList;
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
                'name' => 'required|unique:fee_types,name|min:3'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('fee/create')->with('errors', $validator->messages());

        } else {
            $fee->save();

            return Redirect::action('Fee\IndexController@home');

        }
    }

    public function feelist()
    {
        $categorys = Category::all();
        $fees = Fee::all();
        return View('fee.list', ['categorys' => $categorys, 'fees' => $fees]);
    }


    public function listCreate()
    {
        $feelist = new FeeList;
        $input = Input::all();
        $feelist->categories = $input['category'];
        $feelist->fee_types = $input['fee'];
        $feelist->amount = $input['amount'];
        $feelist->status = '1';

        $validator = Validator::make($input,
            array(
                'category' => 'required',
                'fee' => 'required',
                'amount' => 'required|numeric'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('fee/createlist')->with('errors', $validator->messages());

        } else {

            $feelist->save();

            return Redirect::action('Fee\CreateController@feelist')->with('message', 'Fees created successfully!');


        }
    }


}
