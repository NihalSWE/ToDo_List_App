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
        $taskData = TaskData::findOrFail($id);
        return view('edit', ['taskData' => $taskData]);
    }

    public function updatetask(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255', // Correct table name
            'description' => 'required|max:300', // Correct validation rule
            'status' => 'required|in:pending,completed', // Validation for the status field
            'due_date' => 'required|date' // Validation for the due_date field
        ]);

        $taskData = TaskData::findOrFail($id);
        $taskData->title = $request->title;
        $taskData->description = $request->description;
        $taskData->status = $request->status; // Fixed the typo here
        $taskData->due_date = $request->due_date;

        $taskData->save();

        flash()->success('Your data updated in the app.');

        return redirect()->route('home', ['taskData' => $taskData]);
    }

    public function deletetask(Request $request, $id)
    {
        $taskData = TaskData::findOrFail($id);
        $taskData->delete();
        flash()->success('Your data deleted in the app.');
        return redirect()->route('home');
    }
}





