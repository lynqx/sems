<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\LayoutsMainController;
use App\Models\LibraryBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $librarys = LibraryBook::all();

        return View('library.home', compact('librarys'));
    }

}
