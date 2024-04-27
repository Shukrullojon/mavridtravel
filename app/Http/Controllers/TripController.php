<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::latest()->paginate(20);
        return view('trip.index',[
            'trips' => $trips,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        if ($request->hasFile('image')){
            $filename = time().rand(100,999). '_'. time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
        Trip::create([
            'name' => $request->name,
            'info' => $request->info,
            'status' => $request->status,
            'image' => isset($filename) ? $filename : "",
        ]);
        return redirect()->route('trip.index')->with('success','Trip created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trip = Trip::find($id);
        return view('trip.show',[
            'trip' => $trip,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trip = Trip::find($id);
        return view('trip.edit',[
            'trip' => $trip,
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
        $trip = Trip::find($id);
        $filename = $trip->image;
        if ($request->hasFile('image')){
            if (!empty($trip->image)){
                Storage::delete('public/images/'.$trip->image);
            }
            $filename = time().rand(100,999). '_'. time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('images'), $filename);
        }
        $trip->update([
            'name' => $request->name,
            'info' => $request->info,
            'status' => $request->status,
            'image' => isset($filename) ? $filename : "",
        ]);
        return redirect()->route('trip.index')
            ->with('success','Trip updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Trip::where('id',$id)->delete();
        return redirect()->route('trip.index')
            ->with('success','Trip deleted successfully');
    }
}
