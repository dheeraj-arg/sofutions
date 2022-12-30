<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeRelation;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Support\Facades\DB;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        // dd($data['companies']);
        return view('Admin.company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.company.create');
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
            'name' => 'required',
            'logo' => 'required|mimes:png,jpg|max:1048'
        ]);
        // dd($request);
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo  = $request->file('logo')->store('logo');
        $company->save();

        return redirect()->route('company.index');
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
        $data['company'] = DB::table('companies')->where('id',$id)->first();  
        return view('Admin.company.edit', $data);
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
        // dd($request->all());
        $id = $request->c_id;
        $data=Company::find($id);
        $data->name=$request->get('name');
        $data->email=$request->get('email');
        $data->website=$request->get('website');
        if($request->logo){
            $data->logo=$request->file('logo')->store('logo');
        }
       
        $data->save();
        return redirect ('/admin/company');
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
            $com = Company::find($id);
            $com->delete();
        }
        return  redirect()->route('company.index');
    }

}
