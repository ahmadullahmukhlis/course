<?php

namespace App\Http\Controllers;

use App\Models\test;
use App\Models\student;
use App\Models\subject;
use App\Http\Requests\StoretestRequest;
use App\Http\Requests\UpdatetestRequest;
use Carbon\Carbon;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = subject::all();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $test = student::whereHas('test', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('test_date', '=', $currentMonth)
                ->whereYear('test_date', '=', $currentYear);
        })->get();

        $students = student::whereDoesntHave('test', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('test_date', '=', $currentMonth)
                ->whereYear('test_date', '=', $currentYear);
        })->get();
        $html= view('test.test',compact('students','subject','test'))->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretestRequest $request)
    {
       test:: create([
            'subject_id'=>$request->subject_id,
            'test_score'=>$request->score,
            'student_id'=>$request->student_id,
            'test_date'=>$request->date
        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetestRequest  $request
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetestRequest $request, test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        //
    }
}
