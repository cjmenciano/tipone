<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$employees = Employee::with('company')->get();
        return view('employees.index', compact('employees'));*/

        $employees = Employee::orderBy('company_id','asc')->paginate(10);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$companies = Company::orderBy('name')->get();
        return view('employees.create', compact('companies'));*/
        
        $companies = Company::pluck('name', 'id');
        return view('employees.create', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'company_name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|regex:/^[0-9]+$/|min:7'
        ]);

        // Add new Company
        $employees = new Employee;

        $employees->firstname = ucwords($request->input('firstname'));
        $employees->lastname = ucwords($request->input('lastname'));
        $employees->company_id = $request->input('company_name');
        $employees->email = $request->input('email');
        $employees->phone = $request->input('phone');
        $employees->save();
        
        $lastId = $employees->id;

        return redirect('/employees'.'/'.$lastId)->with('success', 'New Employee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::find($id);
        return view('employees.show')->with('employees', $employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if Auth is not equal to Admin
        //return redirect view('employees')->with('error', 'Unauthorized Page');

        $employees = Employee::find($id);
        $companies = Company::pluck('name', 'id');
        return view('employees.edit', compact('companies'))->with('employees', $employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'lastname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]+$/|min:7'
        ]);


        // Update Employee
        $employees = Employee::find($id);

        $employees->firstname = ucwords($request->input('firstname'));
        $employees->lastname = ucwords($request->input('lastname'));
        $employees->company_id = $request->input('company_name');
        $employees->email = $request->input('email');
        $employees->phone = $request->input('phone');
        $employees->save();

        return redirect('/employees'.'/'.$id)->with('success', 'Employees Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if Auth is not equal to Admin
        //return redirect view('employees')->with('error', 'Unauthorized Page');
        
        $employees = Employee::find($id);
        $employees->delete();

        return redirect('/employees')->with('success', 'Employee Deleted');
    }
}
