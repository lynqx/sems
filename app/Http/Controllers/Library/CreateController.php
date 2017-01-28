<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\LayoutsMainController;
use App\Models\BookCategory;
use App\Models\BookCondition;
use App\Models\Category;
use App\Models\LibraryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CreateController extends LayoutsMainController
{
    public function home()
    {
        $conditions = BookCondition::all();
        $categorys = BookCategory::all();
        return View('library.create', ['conditions' => $conditions, 'categorys' => $categorys]);
    }


    public function saveCreate()
    {

        $rules = array(
            'title' => 'required',
            'category' => 'required',
            'author' => 'required',
            'publisher' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('library/create')->with('errors', $validator->messages());

        } else {

            $library = new LibraryBook;
            $input = Input::all();
            $library->isbn = $input['isbn'];
            $library->title = $input['title'];
            $library->edition = $input['edition'];
            $library->category = $input['category'];
            $library->author = $input['author'];
            $library->publisher = $input['publisher'];
            $library->condition = $input['condition'];
            $library->shelf_no = $input['shelf'];
            $library->book_position = $input['position'];
            $library->cost = $input['cost'];
            $library->copies = $input['copies'];
            $library->avatar = $input['avatar'];


            $library->save();

            return Redirect::action('Library\IndexController@home')->with('message', 'Book added successfully!');

        }
    }

}
