@extends('templates.master')


@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
    <h2 class="alert alert-success text-center color:red">CREATE YOUR NEW EMPLOYEE HERE</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">

                @csrf

                <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="fullname">FullName</label>
                        <input mdbInput type="text" class="form-control" name="fullname" id="fullname" value="{{old('fullname')}}">
                        @error('fullname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <label for="department">Department</label>
                        <input mdbInput type="text" class="form-control" name="department" id="department"  value="{{old('department')}}">

                        @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                    <!-- Default input -->
                    <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                        <input mdbInput type="text" class="form-control" name="gender" id="gender" value="{{old('gender')}}">
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                    <label for="email">Email</label>
                        <input mdbInput type="email" class="form-control" name="email" id="email"  value="{{old('email')}}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        
                        <div class="form-group col-md-3">
                        <label for="image">Choose Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="{{old('image')}}">
                            <p class="text-danger">Image should be 2MB and below</p>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Grid row -->
                    <a href="{{ route('employees.index') }}" class="btn btn-warning">Cancel</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Create Employee</button>
                </form>
                <!-- Extended default form grid -->
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
                            $('#image').click();                 
                        })
                        $('#image').on('change', function(e){
                            showFile(this, '#showImage');
                        })
</script>

@endsection