<?php

namespace App\Http\Controllers\Settings;

use App\Models\Settings\EmployeePosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeePositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeePositions = EmployeePosition::orderBy('created_at', 'desc')
            ->get();
        return view('settings.employee_positions.index', compact('employeePositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.employee_positions.create', [
            'employeePosition' => new EmployeePosition
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        EmployeePosition::create($validatedData);

        flash('Employee Position has been saved!');

        return redirect()
            ->route('employee-positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeePosition $employeePosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeePosition $employeePosition)
    {
        return view('settings.employee_positions.edit', [
            'employeePosition' => $employeePosition
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeePosition $employeePosition)
    {
        $validatedData = $this->validateData($request);

        $employeePosition->update($validatedData);

        flash('Employee Position has been updated!');

        return redirect()
            ->route('employee-positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings\EmployeePosition  $employeePosition
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeePosition $employeePosition)
    {
        flash('"'.$employeePosition->name.'" employee position has been deleted!');
        $employeePosition->delete();
        return back();
    }

    protected function validateData($request)
    {
        return $request->validate([
            'user_id' => 'required',
            'name' => 'required'
        ]);
    }
}
