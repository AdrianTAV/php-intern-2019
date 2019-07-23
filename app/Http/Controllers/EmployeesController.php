<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Company;
use Validator, Input, Redirect;

class EmployeesController extends Controller
{
    public function show()
    {


        $employees = Employee:: join('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name AS company_name')
            ->get();

        $companies = Company::all();

        return view('Employees.employees', compact('employees', 'companies'));
    }

    public function add()
    {

        $companies = Company::all();
        return view('Employees.add', compact('companies'));
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|:Employees|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/employees/add')
                ->withErrors($validator)
                ->withInput();
        }

        $requestData = $request->all();

        $employee = new Employee();
        $employee->name = $requestData['name'];
        $employee->company_id = $requestData['company_id'];

        $employee->save();

        return redirect('/employees');

    }

    public function edit($id){

        $employee = Employee::find($id);
        $companies = Company::all();

        return view('Employees.edit' , compact('employee' , 'id','companies'));

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required|:Employees|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/employees/edit/{id}')
                ->withErrors($validator)
                ->withInput();
        }

        $employee = Employee::find($id);

        $employee -> name = request('name');
        $employee -> company_id = request('company_id');

        $employee -> save();

        return redirect('/employees');
    }

    public function delete($id){

        $employee = Employee::find($id);
        $employee -> delete($id);

        return redirect('/employees');

    }
}
