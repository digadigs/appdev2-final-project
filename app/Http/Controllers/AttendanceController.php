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

        return Attendance::create($request->all());
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
        return $attendance;
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->noContent();
    }
}
