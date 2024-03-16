<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        $html= view('student.all_student',compact('students'))->render();
       return response()->json(['html' => $html]);
    }
    public function search(Request $request){
        $students = Student::where("name", "like", "%" . $request->search . "%")
        ->orWhere("father_name", "like", "%" . $request->search . "%")
        ->get();
        $html= view('student.all_student',compact('students'))->render();
       return response()->json(['html' => $html]);  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = subject::all();
         $html= view('student.new_student',compact('subject'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {
        if(student::create($request->all())){
           return $this->index();
        }else{
            return 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        
         $html= view('student.show-student',compact('student'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $subject = subject::all();
        $html= view('student.edit_student',compact('subject','student'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        if($student->update($request->all())){
            return $this->index();
        }else{
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        if($student->delete()){
            return $this->index();
        }else{
            return 0;
        }
    }
}
