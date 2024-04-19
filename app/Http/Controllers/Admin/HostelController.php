<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostels;
use App\Models\Roomtype;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hostels.index', [
            'hostels' => Hostels::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hostels.create', [
            'roomtypes' => Roomtype::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hostels',
            'address' => 'required',
            'roomtype_id.*' => 'required',
            'totalroom.*' => 'required',
        ]);

        Hostels::createOrupdate($request);
        return redirect()->route('hostels.index')->with('success', 'Hostel created successfully');
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
        return view('admin.hostels.edit', [
            'hostel' => Hostels::find($id),
            'roomtypes' => Roomtype::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:hostels,name,' . $id,
            'address' => 'required',
            'roomtype_id.*' => 'required',
            'totalroom.*' => 'required',
        ]);

        Hostels::createOrupdate($request, $id);
        return redirect()->route('hostels.index')->with('success', 'Hostel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hostels::destroy($id);
        return redirect()->route('hostels.index')->with('success', 'Hostel deleted successfully');
    }
}
