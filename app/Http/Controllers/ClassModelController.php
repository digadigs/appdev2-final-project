<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClassModel::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required',
        ]);

        return ClassModel::create($request->all());
    }

    public function show(ClassModel $class)
    {
        return $class;
    }

    public function update(Request $request, ClassModel $class)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject' => 'required',
        ]);

        $class->update($request->all());
        return $class;
    }

    public function destroy(ClassModel $class)
    {
        $class->delete();
        return response()->noContent();
    }
}
