<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Company;
use Validator, Input, Redirect;


class CompaniesController extends Controller
{
    public function show()
    {

        $companies = Company::all();
        return view('Companies.companies', compact('companies'));
    }

    public function add()
    {

        $companies = Company::all();
        return view('Companies.add', compact('companies'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|:Companies|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/companies/add')
                ->withErrors($validator)
                ->withInput();
        }

        $requestData = $request->all();

        $company = new Company();
        $company->name = $requestData['name'];
        $company->description = $requestData['description'];

        $company->save();

        return redirect('/companies');

    }

    public function edit($id)
    {


        $company = Company::find($id);

        return view('Companies.edit', compact('id', 'company'));

    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|:Companies|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/companies/edit/{id}')
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::find($id);

        $company->name = request('name');
        $company->description = request('description');

        $company->save();

        return redirect('/companies');
    }

    public function delete($id)
    {

        $company = Company::find($id);
        $company->delete($id);

        return redirect('/companies');

    }
}
