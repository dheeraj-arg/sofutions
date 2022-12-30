@extends('adminlte::page')
@section('script')
    <script src="{{asset('/js/select2.min.js')}}"></script>
@stop
@section('content')

<div class="container">
    @role('admin')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mt-5">Edit Company</h1>
                <hr>
                <div class="container justify-content-center mt-2 mb-5">

                    {!! Form::open(['route'=>'company.update','method'=>'PUT','class'=>'form-horizontal','files'=>'true']) !!}
                        @csrf
            
                        <div class="form-group m-2 p-2">
                            <label for="company_title">Company Name</label>
                            {!! Form::text('name', $value = $company->name, ['id'=>'name', 'placeholder'=>'Enter name','class'=>'form-control', 'required']) !!}
                            {!! Form::hidden('c_id', $value = $company->id, ['id'=>'c_id']) !!}
                        </div>
            
                        <div class="form-group m-2 p-2">
                            <label for="company_email">Email</label>
                            {!! Form::text('email', $value = $company->email, ['id'=>'email', 'placeholder'=>'Enter email','class'=>'form-control', 'required']) !!}
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="website">Website</label>
                            {!! Form::text('website', $value = $company->website, ['id'=>'website', 'placeholder'=>'Enter website','class'=>'form-control', 'required']) !!}
                        </div>

                        <div class="form-group m-2 p-2">
                            <label for="company_logo">Logo</label>
                            <img class="m-2 p-2" style="width:100px;height:auto;" src="{{ URL::to('/storage/'.$company->logo) }}" />
                            {!! Form::file('logo', $value = null, ['id'=>'logo', 'class'=>'form-control', 'required']) !!}
                        </div>

                        <button class="btn btn-success" type="submit" value="submit">Update Company</button>
            
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