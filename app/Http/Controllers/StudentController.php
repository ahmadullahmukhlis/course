<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Contracts\View\View;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::all();
        return view('student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('new-student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
    {

        $student =   student::create([
            'full_name' => $request->name,
            'father_name' => $request->father_name,
            'g_f_name' => $request->g_father_name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        $student->subject()->attach([
            'subject_id' => $request->subject_id
        ]);
        return redirect()->route('students.index')->with('message', 'the data has been saved ');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        return view('edit-student', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
