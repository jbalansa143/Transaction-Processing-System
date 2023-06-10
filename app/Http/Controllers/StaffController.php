<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|min:2',
            'middlename' => 'required',
            'lastname' => 'required|min:2',
            'address' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'role' => 'required',
            'salary' => 'required|numeric',
            'emergency_number' => 'nullable',
        ]);

        Staff::create($validate); 
        return redirect()->route('staff.index')->with('success', 'New staff has been added');
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        
        $staff->delete();
        return redirect()->route('staff.index')->with('danger', 'Staff has been archived');
    }
}
