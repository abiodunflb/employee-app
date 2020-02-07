@extends('templates.master')


@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
    <h2 class="alert alert-success text-center color:red">UPDATE EMPLOYEE DATA</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="post" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <!-- Extended default form grid -->
                <form>
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <input mdbInput type="text" class="form-control" name="fullname" id="fullname" placeholder="First Name" value="{{ $employee->fullname }}">
                        @error('fullname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <input mdbInput type="text" class="form-control" name="gender" id="gender"  value="{{ $employee->gender }}">
                        @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                        <input mdbInput type="email" class="form-control" name="email" id="email"  value="{{ $employee->email }}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <!-- Default input -->
                        <div class="form-group col-md-6">
                        <input mdbInput type="text" class="form-control" name="department" id="department"  value="{{ $employee->department }}">
                        @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="file" name="image" id="image" class="form-control" value="{{ $employee->image }}">
                                <p class="text-danger">Image should be 2MB and below</p>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <img src="{{ URL::to('/') }}/images/{{ $employee->image }}" class="rounded-circle" width="60" />
                                <input type="hidden" name="hidden_image" value="{{ $employee->image }}" />
                            </div>
                        </div>
                        
                    </div>
                    <!-- Grid row -->
                    <a href="{{ route('employees.index') }}" class="btn btn-warning">Cancel</a>
                    <button type="submit"  name="add" class="btn btn-info input-lg">Update</button>
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