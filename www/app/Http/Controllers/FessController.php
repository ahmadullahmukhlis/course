<?php

namespace App\Http\Controllers;

use App\Models\fess;
use App\Models\student;
use App\Models\subject;
use App\Http\Requests\StorefessRequest;
use App\Http\Requests\UpdatefessRequest;
use Carbon\Carbon;
class FessController extends Controller
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
        $fees = student::whereHas('fees', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('payDate', '=', $currentMonth)
                ->whereYear('payDate', '=', $currentYear);
        })->get();

        $students = student::whereDoesntHave('fees', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('payDate', '=', $currentMonth)
                ->whereYear('payDate', '=', $currentYear);
        })->get();
        $html= view('fees.fees',compact('students','subject','fees'))->render();
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
     * @param  \App\Http\Requests\StorefessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefessRequest $request)
    {
        $student = student::find($request->student_id);
        fess::create([
            'subject_id'=>$request->subject_id,
            'amount'=>$request->amount,
            'student_id'=>$request->student_id,
            'paydate'=>$request->date
        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fess  $fess
     * @return \Illuminate\Http\Response
     */
    public function show(fess $fess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fess  $fess
     * @return \Illuminate\Http\Response
     */
    public function edit(fess $fess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefessRequest  $request
     * @param  \App\Models\fess  $fess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefessRequest $request, fess $fess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fess  $fess
     * @return \Illuminate\Http\Response
     */
    public function destroy(fess $fess)
    {
        //
    }
}
