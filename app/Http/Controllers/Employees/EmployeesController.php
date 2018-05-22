<?php

namespace App\Http\Controllers\Employees;

use Illuminate\Http\Request;
use App\Models\Employees\Employee;
use App\Http\Controllers\Controller;
use App\Models\Settings\EmployeePosition;
use App\Http\Requests\Employees\CreateEmployeeFormRequest;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')
            ->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create', [
            'employee' => new Employee,
            'employeePositions' => EmployeePosition::select('id', 'name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeFormRequest $request)
    {
        Employee::create($request->all());

        flash('Employee details has been saved!');

        return redirect()
            ->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'employeePositions' => EmployeePosition::select('id', 'name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        flash('Employee details has been updated!');

        return redirect()
            ->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
      $employee->delete();

        flash('Employee details has been deleted!');

        return back();
    }
}
