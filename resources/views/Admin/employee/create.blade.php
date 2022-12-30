@extends('adminlte::page')

@section('content')

<div class="container">
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Create Employee</h1>
                <hr>
                <div class="container justify-content-center mt-2 mb-5">

                    {!! Form::open(['route'=>'employee.store','method'=>'POST','class'=>'form-horizontal','role'=>'form']) !!}
                        @csrf
            
                        <div class="form-group m-2 p-2">
                            <label for="firstname">First Name</label>
                            <input class="form-control" type="text" name="firstname" placeholder="Employee Title" required>
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="lastname">Last Name</label>
                            <input class="form-control" type="text" name="lastname" placeholder="Employee Number">
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="employee_email">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Employee Email" required>
                        </div>
            
                        <div class="form-group m-2 p-2">
                            <label for="phone">Phone Number</label>
                            {!! Form::number('phone', $value = null, ['id'=>'phone', 'placeholder'=>'Enter phone','class'=>'form-control']) !!}
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="">Select Company</label>
                            {!! Form::select('company',$company, $value = null, ['id'=>'type','placeholder'=>'Select Option','class'=>'form-control selectOption', ]) !!}
                        </div>
                        <button class="btn btn-success" type="submit" value="submit">Add Employee</button>
            
                    {!! Form::close() !!}
            
                </div>
            </div>
        </div>
    @else
        <p class="text-center">
            You don't have permission to add or view companies.
        </p>
    @endrole
</div>
    
@endsection