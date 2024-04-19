<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roomtype;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roomtype.index', [
            'roomtypes' => Roomtype::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roomtypes',
        ]);
    
        Roomtype::createOrUpdate($request);
        return redirect()->route('room-type.index')->with('success', 'Room Type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.roomtype.edit', [
            'roomtype' => Roomtype::findOrFail($id),
            'roomtypes' => Roomtype::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roomtypes,name,' . $id,
        ]);
    
        Roomtype::createOrUpdate($request, $id);
        return redirect()->route('room-type.index')->with('success', 'Room Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Roomtype::destroy($id);
        return redirect()->route('room-type.index')->with('success', 'Room Type deleted successfully');
    }
}
