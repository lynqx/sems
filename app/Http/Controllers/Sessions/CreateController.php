<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Course;
use App\Models\Session;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class CreateController extends LayoutsMainController
{
    public function home()
    {
        $terms = Term::all();
        return View('sessions.create', ['terms' => $terms]);
    }


    public function saveCreate()
    {
        $session = new Session;
        $input = Input::all();
        $session->start_year = $input['start'];
        $session->end_year = $input['end'];
        $session->term = $input['term'];
        $session->status = '1';

        $validator = Validator::make($input,
            array(
                'start' => 'required',
                'end' => 'required',
                'term' => 'required'

            )
        );
        if ($validator->fails()) {
            return Redirect::to('sessions/create')->with('errors', $validator->messages());

        } else {


            Session::where('status', 1)
                ->update(['status' => 0]);

            $session->save();

            return Redirect::action('Sessions\CreateController@home')->with('message', 'Session added successfully!');

        }
    }


    public function edit()
    {
        echo "Quite easily done";
    }


    public function delete(Category $category)
    {
        return View('category/delete', compact('category'));
    }


    public function doDelete()
    {
        $category = Category::findOrFail(Input::get('cat_id'));
        $category->delete();

        return Redirect::action('CategorysController@home');
    }


}
