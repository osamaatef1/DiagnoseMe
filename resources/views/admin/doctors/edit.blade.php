@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Update Doctor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('doctors.update',$doctor['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$doctor['name']}}">
                        </div>

                        <div class="form-group">
                            <label for="email"> Address</label>
                            <input type="address" name="address" class="form-control" id="email" placeholder="Enter address" value="{{$doctor['address']}}">
                        </div>
                        <div class="form-group">
                            <label for="info">info</label>
                            <input type="text" name="info" class="form-control" id="info" placeholder=""value="{{$doctor['info']}}>
                        </div>
                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="text" name="PhoneNumber" class="form-control" id="PhoneNumber" placeholder=""value="{{$doctor['PhoneNumber']}}>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
