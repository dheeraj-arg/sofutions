<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeRelation;
use Illuminate\Http\Request;

class AdminSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = EmployeeRelation::all();
        return view('Admin.setup.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::pluck('name','id');
        $data['companies'] = Company::pluck('name','id');
        $data['employees'] = Employee::pluck('name','id');
        return view('Admin.setup.create', $data);
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
            'company_id' => 'required',
            'employee_ids' => 'required',
            'department_ids' => 'required',
        ]);
        $data = $request->all();
        // dd($data);
        $EmployeeRelation = new EmployeeRelation();
        $EmployeeRelation->company_id = $request->company_id;
        $EmployeeRelation->employee_ids = json_encode($request->employee_ids);
        $EmployeeRelation->department_ids = json_encode($request->department_ids);
        $EmployeeRelation->save();

        return redirect()->route('setup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
