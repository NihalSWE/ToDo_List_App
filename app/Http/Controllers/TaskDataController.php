<?php

namespace App\Http\Controllers;

use App\Models\TaskData;
use Illuminate\Http\Request;

class TaskDataController extends Controller
{
    public function taskCreate()
    {
        return view("create");
    }

    public function storeData(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:task_data|max:255', // Correct table name
            'description' => 'required|max:300', // Correct validation rule
            'status' => 'required|in:pending,completed', // Validation for the status field
            'due_date' => 'required|date' // Validation for the due_date field
        ]);

        $taskData = new TaskData();
        $taskData->title = $request->title;
        $taskData->description = $request->description;
        $taskData->status = $request->status; // Fixed the typo here
        $taskData->due_date = $request->due_date;

        $taskData->save();

        flash()->success('Your data saved in the app.');

        return redirect()->route('home');

    }

    public function edittask(Request $request, $id)
    {
        return view('edit');
    }
}





Route::post('store/', ['tasks' => TaskData::all()])->name('store');