<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'email' => 'required|email|unique:students,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'course' => 'required',
        ]);
        
        $student = Student::create($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Student added successfully',
            'student' => $student
        ]);
        
    }

    public function show(Student $student)
    {
        return $student;
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'email' => 'required|email|unique:students,email,'.$student->id,
            'firstname' => 'required',
            'lastname' => 'required',
            'course' => 'required',
        ]);
        
        $student->update($request->all());
        
        return response()->json([
            'message' => 'Student updated successfully',
            'student' => $student,
        ]);
        
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);

    }
}
