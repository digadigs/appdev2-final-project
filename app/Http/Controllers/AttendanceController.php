<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Attendance::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'status_id' => 'required|exists:statuses,id',
            'token' => 'required',
        ]);

        $attendance = Attendance::create($request->all());

        return response()->json([
            'message' => 'Attendance data successfully added',
            'data' => $attendance
        ], 201);
    }

    public function show(Attendance $attendance)
    {
        return $attendance;
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'status_id' => 'required|exists:statuses,id',
            'token' => 'required',
        ]);
        
        $attendance->update($request->all());
        
        return response()->json([
            'message' => 'Attendance successfully updated',
            'attendance' => $attendance
        ], 200);
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return response()->json([
            'message' => 'Attendance data successfully deleted'
        ], 200);
    }
}
