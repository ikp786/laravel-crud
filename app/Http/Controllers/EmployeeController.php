<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Exception;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'Employee List';
        $employees  = Employee::all();
        $data       = compact('title', 'employees');
        return view('employees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = 'Employee create';
        $data       = compact('title');
        return view('employees.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $input = $request->validated();
            if ($request->hasFile('profile_picture')) {
                $fileName = time() . '_' . str_replace(" ", "_", $request->profile_picture->getClientOriginalName());
                $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');
                $input['profile_picture'] = $fileName;
            }
            $employee = new Employee();
            $employee->fill($input);
            $employee->save();
            return redirect()->route('employees.index')->with('Success', 'Employee created successfully.');;
        } catch (Exception $e) {
            return redirect()->back()->with('Failed', $e->getMessage() . ' On Line ' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $title      = 'Employee create';
        //$employees  = Employee::find();
        $data       = compact('title', 'employee');
        return view('employees.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $input = $request->validated();
            if ($request->hasFile('profile_picture')) {
                $fileName = time() . '_' . str_replace(" ", "_", $request->profile_picture->getClientOriginalName());
                $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');
                $input['profile_picture'] = $fileName;
            } else {
                unset($input['profile_picture']);
            }
            $employee->fill($input);
            $employee->save();
            return redirect()->route('employees.index')->with('Success', 'Employee detail update successfully');;
        } catch (Exception $e) {
            return redirect()->back()->with('Failed', $e->getMessage() . ' On Line ' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            if (isset($employee)) {

                if (Storage::disk('public')->exists('profile_pictures/' . $employee->profile_picture)) {
                    Storage::disk('public')->delete('profile_pictures/' . $employee->profile_picture);
                }
                $employee->delete();
            }
            return redirect()->back()->with('Success', 'Employee delete successfully');;
        } catch (Exception $e) {
            return redirect()->back()->with('Failed', $e->getMessage() . ' On Line ' . $e->getLine());
        }
    }
}
