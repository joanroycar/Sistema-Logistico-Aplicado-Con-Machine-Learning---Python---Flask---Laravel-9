<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\EmployeeType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:employee.index')->only('index');
         $this->middleware('can:employee.edit')->only('edit','update');
         $this->middleware('can:employee.create')->only('create','store');
         $this->middleware('can:employee.destroy')->only('destroy');
    }

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeetype = EmployeeType::pluck('name','id');

        $area = Area::pluck('name','id');

        return view('employees.create',compact('employeetype','area'));
   
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'max:9',
            'address' => 'max:255',
            'numberdocument' => 'max:11',
            'employee_type_id' => 'required',
            'area_id' => 'required',
            // 'datebirth' => 'date'            
        ]);
    
        $employee = Employee::create($request->all());

        return redirect()->route('employees.index')->with('guardar', 'ok');


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
        $employeetype = EmployeeType::pluck('name','id');

        $area = Area::pluck('name','id');


        return view('employees.edit',compact('employee','employeetype','area'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'max:9',
            'address' => 'max:250',
            'numberdocument' => 'max:11',
            'employee_type_id' => 'required',
            'area_id' => 'required',
            // 'datebirth' => 'date'
            
        ]);
        
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('guardar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('guardar', 'ok');
    }
}
