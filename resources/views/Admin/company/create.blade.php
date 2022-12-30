@extends('adminlte::page')
@section('script')
    <script src="{{asset('/js/select2.min.js')}}"></script>
@stop
@section('content')

<div class="container">
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Create Company</h1>
                <hr>
                <div class="container justify-content-center mt-2 mb-5">

                    {!! Form::open(['route'=>'company.store','method'=>'POST','class'=>'form-horizontal','files'=>'true']) !!}
                        @csrf
            
                        <div class="form-group m-2 p-2">
                            <label for="company_title">Company Name</label>
                            {!! Form::text('name', $value = null, ['id'=>'name', 'placeholder'=>'Enter name','class'=>'form-control', 'required']) !!}
                        </div>
            
                        <div class="form-group m-2 p-2">
                            <label for="company_email">Email</label>
                            {!! Form::text('email', $value = null, ['id'=>'email', 'placeholder'=>'Enter email','class'=>'form-control', 'required']) !!}
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="website">Website</label>
                            {!! Form::text('website', $value = null, ['id'=>'website', 'placeholder'=>'Enter website','class'=>'form-control', 'required']) !!}
                        </div>
            
                        <div class="form-group m-2 p-2">
                            <label for="company_logo">Logo</label>
                            {!! Form::file('logo', $value = null, ['id'=>'logo', 'class'=>'form-control', 'required']) !!}
                        </div>

                        <button class="btn btn-success" type="submit" value="submit">Add Company</button>
            
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
    
<script>   
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Option",
            allowClear: true
        });
    });
</script>
@endsection