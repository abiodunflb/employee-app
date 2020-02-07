@extends('templates.master')


@section('content')
    <style>
        .container{
            padding:0.5%;
        }
    </style>

    <div class="container">
        <h2 class="text-center alert alert-primary" style="color:red; text:bold"> 
            <span class="fab fa-laravel">
            Employees Data with Laravel 6/Bootstrap 4... by Afolabi Abiodun
            </span>
        </h2>

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
<!-- container end -->

        <div align="right">
            <a href="{{route('employees.create')}}" class="btn btn-primary">
            <span class="fa fa-plus-circle"> Add new Employeessss</span>
            </a>
        </div>

       <div class="table-responsive" style="overflow-x:auto;"> 
       <table class="table  table-dark table-striped table-hover table-responsive-sm" width="100%">
            <thead class="bg-info">
                <tr class="text-center">
                    <th width="10%">Image</th>
                    <th >Full Name</th>
                    <th >Gender</th>
                    <th >Email</th>
                    <th >Department</th>
                    <th >Action</th>
                </tr>
            </thead>
        @forelse($employees as $employee)
            <tbody>
                <tr class="text-center">
                <td><img src="{{ URL::to('/') }}/images/{{ $employee->image }}" class="rounded-circle" width="60" height="50" /></td>
                    <td>{{ $employee->fullname }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->department }}</td>
                    <td width="25%">
                        <form action="{{route('employees.destroy', $employee->id)}}" method="POST">
                            
                            
                            
                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-sm btn-info mt-1">
                                <span class="fa fa-edit"></span> Edit
                                
                            </a>
                            

                            
                            <a href="{{route('employees.show', $employee->id)}}" class="btn btn-sm btn-warning mt-1">
                                <span class="fa fa-eye"></span> View
                                
                            </a>
                            


                            
                            

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
                        
                        </form>
                    
                    </td>
                </tr>
            </tbody>
            @empty
            
            <h6 class="alert alert-danger">No Employee data to display</h6>

            @endforelse
        </table>
       </div> 
        
        {!! $employees->links() !!}
@endsection
