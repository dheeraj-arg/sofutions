@extends('layouts.app')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Company Employee Setup</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('setup.create') }}"> Add Setup </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Department</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($companies) > 0)
                            @foreach($companies as $key =>$company)
                            @php
                            if(count(json_decode($company->employee_ids)) > 1){
                                foreach (json_decode($company->employee_ids) as $emp_ids) {
                                        $employees[] = App\Models\Employee::where('id','=',$emp_ids)->first()->name;
                                    }
                                    $employees = implode(', ', $employees);

                            }else{
                                $employees = App\Models\Employee::where('id','=',json_decode($company->employee_ids))->first()->name;
                            }
                            if(count(json_decode($company->department_ids)) > 1){
                                foreach (json_decode($company->department_ids) as $dept_id) {
                                        $departments[] = App\Models\Department::where('id','=',$dept_id)->first()->name;
                                    }
                                    $departments = implode(', ', $departments);
                            }else{
                                $departments = App\Models\Department::where('id','=',json_decode($company->department_ids))->first()->name;
                            }
                            @endphp
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{$company->CompanyName->name }}</td>
                                <td>{{ $employees ?? '' }}</td>
                                <td>{{ $departments ?? '' }}</td>
                            </tr>                    
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found!!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@else
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="text-center mt-5">Company List</h1>
           <p class="text-center mt-20"> You are not authorize to view this section. </p>
        </div>
    </div>
</div>
@endrole
<style>
    .add-btn{
        color: white;
    }
    .add-btn:hover{
        color: yellow;
    }
</style>
@endsection