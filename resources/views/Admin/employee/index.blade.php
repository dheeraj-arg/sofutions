@extends('adminlte::page')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Employee List</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('employee.create') }}"> Add Employee </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Company</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($employees) > 0)
                            @foreach($employees as $key => $employee)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $employee->firstname }}</td>
                                <td>{{ $employee->lastname }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->companyName->name }}</td>
                                <td><a href="{{ route('employee.edit',$employee->id)}}"><button class="btn btn-warning">Edit</button></a><br><a href="{{ route('employee.destroy',$employee->id)}}"><button class="btn btn-danger">Delete</button></a></td>
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
        <h1 class="text-center mt-5">Employee List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">Company</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($employees) > 0)
                        @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{ $employee->firstname }}</td>
                            <td>{{ $employee->lastname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->companyName->name }}</td>
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