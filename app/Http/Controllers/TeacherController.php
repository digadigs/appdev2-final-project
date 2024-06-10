<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Teacher::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        return Teacher::create($request->all());
    }

    public function show(Teacher $teacher)
    {
        return $teacher;
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        
        $teacher->update($request->all());
        return response()->json([
            'message' => 'Teacher updated successfully',
            'teacher' => $teacher,
        ]);        
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Teacher successfully deleted.'
        ], 200);
        
    }
}
