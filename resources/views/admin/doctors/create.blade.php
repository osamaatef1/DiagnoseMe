@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class=" pt-3 card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Add New Doctor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('doctors.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label for="address"> Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address Of The Doctor">
                        </div>
                        <div class="form-group">
                            <label for="info">info</label>
                            <input type="text" name="info" class="form-control" id="info" placeholder="Information About The Doctor">
                        </div>
                        <div class="form-group">
                            <label for="Phone Number">Number</label>
                            <input type="text" name="PhoneNumber" class="form-control" id="phoneNumber" placeholder="Phone number">
                                </div>

                            </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>

            <!-- /.card -->

@endsection
