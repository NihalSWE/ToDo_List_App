<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskDataController extends Controller
{
    public function taskCreate()
    {
        return view("create");
    }

    public function storeData()
    {
        return "text";
    }
}
