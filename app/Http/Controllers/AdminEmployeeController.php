<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees'] = Employee::all();
        return view('Admin.employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['company'] = Company::pluck('name','id');       
        return view('Admin.employee.create', $data);
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
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        $data = $request->all();
        $company = new Employee();
        $company->firstname = $request->firstname;
        $company->lastname = $request->lastname;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->company_id = $request->company;
        $company->save();

        return redirect()->route('employee.index');
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
        $data['employee'] = DB::table('employees')->where('id',$id)->first();  
        $data['company'] = Company::pluck('name','id');   
        return view('Admin.employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->emp_id;
        $data=Employee::find($id);
        $data->firstname=$request->get('firstname');
        $data->lastname=$request->get('lastname');
        $data->email=$request->get('email');
        $data->phone=$request->get('phone');
        $data->company_id=$request->get('company');
       
        $data->save();
        return redirect ('/admin/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){
            $employee = Employee::find($id);
            $employee->delete();
        }
        return  redirect()->route('employee.index');
    }
}
