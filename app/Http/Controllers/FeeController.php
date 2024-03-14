<?php

namespace App\Http\Controllers;

use App\Models\fee;
use App\Http\Requests\StorefeeRequest;
use App\Http\Requests\UpdatefeeRequest;
use App\Models\student;
use Carbon\Carbon;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $fees = student::whereHas('fees', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('payment_date', '=', $currentMonth)
                ->whereYear('payment_date', '=', $currentYear);
        })->get();

        $students = student::whereDoesntHave('fees', function ($query) use ($currentMonth, $currentYear) {
            $query->whereMonth('payment_date', '=', $currentMonth)
                ->whereYear('payment_date', '=', $currentYear);
        })->get();
        return view('fees', compact('fees', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = request('id');
        return view('add_fees', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorefeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatefeeRequest $request, fee $fee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fee $fee)
    {
        //
    }
}
