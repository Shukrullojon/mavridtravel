<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Date;
use App\Models\Trip;
use Illuminate\Http\Request;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::latest()->paginate(20);
        return view('date.index', [
            'dates' => $dates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('status', 1)->get()->pluck('name', 'id');
        $trips = Trip::where('status', 1)->get()->pluck('name', 'id');
        return view('date.create', [
            'cars' => $cars,
            'trips' => $trips,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'trip_id' => 'required',
            'car_id' => 'required',
        ]);
        Date::create($request->all());
        return redirect()->route('date.index')->with('success', 'Date created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $date = Date::find($id);
        return view('date.show', [
            'date' => $date,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cars = Car::where('status', 1)->get()->pluck('name', 'id');
        $trips = Trip::where('status', 1)->get()->pluck('name', 'id');
        $date = Date::find($id);
        return view('date.edit', [
            'date' => $date,
            'cars' => $cars,
            'trips' => $trips,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'car_id' => 'required',
            'trip_id' => 'required',
        ]);
        $date = Date::find($id);
        $date->update($request->all());
        return redirect()->route('date.index')
            ->with('success', 'Date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Date::where('id', $id)->delete();
        return redirect()->route('date.index')->with('success', 'Date deleted successfully');
    }
}
