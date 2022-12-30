@extends('adminlte::page')

@section('content')
@role('admin')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5">Company List</h1>
            <button class="btn btn-primary"><a class="add-btn" href="{{ route('company.create') }}"> Add Company </a></button>
            <div class="container justify-content-center mt-2 mb-5">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($companies) > 0)
                            @foreach($companies as $key => $company)                           
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><img style="width:100px;height:auto;" src="{{ URL::to('/storage/'.$company->logo) }}" /></td> 
                                <td>{{ $company->website }}</td>
                                <td><a href="{{ route('company.edit',$company->id)}}"><button class="btn btn-warning">Edit</button></a><br><a href="{{ route('company.destroy',$company->id)}}"><button class="btn btn-danger">Delete</button></a></td>
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($companies) > 0)
                        @foreach($companies as $key => $company)                         
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->logo }}</td>
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