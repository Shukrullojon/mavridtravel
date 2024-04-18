<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Trip;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->paginate(20);
        return view('car.index',[
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Car::create($request->all());
        return redirect()->route('car.index')->with('success','Car created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::find($id);
        return view('car.show',[
            'car' => $car,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        return view('car.edit',[
            'car' => $car,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $car = Car::find($id);
        $car->update($request->all());
        return redirect()->route('car.index')
            ->with('success','Car updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect()->route('car.index')
            ->with('success','Car deleted successfully');
    }
}
