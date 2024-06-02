<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Status::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
        ]);

        return Status::create($request->all());
    }

    public function show(Status $status)
    {
        return $status;
    }

    public function update(Request $request, Status $status)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $status->update($request->all());
        return $status;
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return response()->noContent();
    }
}
