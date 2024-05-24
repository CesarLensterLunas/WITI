@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> My Account</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action=""enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="card-body">
                    <div class=row>
                    <div class="form-group col-md-6">
    <label>First Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" disabled placeholder="First Name">
    <div style="color:red">{{ $errors->first('name')}}</div>
</div>
<div class="form-group col-md-6">
    <label>Last Name <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name)}}" name="last_name" disabled placeholder="Last Name">
    <div style="color:red">{{ $errors->first('last_name')}}</div>
</div>

<div class="form-group col-md-6">
    <label>Gender <span style="color: red;">*</span></label>
    <select class="form-control" required name="gender" disabled>
        <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
        <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
        <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
    </select>
    <div style="color:red">{{ $errors->first('gender')}}</div>
</div>

<div class="form-group col-md-6">
    <label>Date of Birth <span style="color: red;">*</span></label>
    <input type="date" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth" disabled>
    <div style="color:red">{{ $errors->first('date_of_birth')}}</div>
</div>

                    <div class="form-group col-md-6">

                    <label>Mobile Number <span style="color: red;"></span></label>
                    <input type="text" class="form-control" value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number" placeholder="Mobile Number">
                    <div style="color:red">{{ $errors->first('mobile_number')}}</div>

                  </div>



                <div class="form-group col-md-6">
                    <label>Profile Pic <span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic')}}</div>
                     @if(!empty($getRecord->getProfile()))
                    <img src="{{ $getRecord->getProfile() }}" style="width: 100px;">
                     @endif

                </div>

                <div class="form-group col-md-6">
                    <label>Blood Type <span style="color: red;"></span></label>
                    <select class="form-control" name="blood_group">
                        <option value="">Select Blood Group</option>
                        <option value="A+" @if(old('blood_group', $getRecord->blood_group) == 'A+') selected @endif>A+</option>
                        <option value="A-" @if(old('blood_group', $getRecord->blood_group) == 'A-') selected @endif>A-</option>
                        <option value="B+" @if(old('blood_group', $getRecord->blood_group) == 'B+') selected @endif>B+</option>
                        <option value="B-" @if(old('blood_group', $getRecord->blood_group) == 'B-') selected @endif>B-</option>
                        <option value="AB+" @if(old('blood_group', $getRecord->blood_group) == 'AB+') selected @endif>AB+</option>
                        <option value="AB-" @if(old('blood_group', $getRecord->blood_group) == 'AB-') selected @endif>AB-</option>
                        <option value="O+" @if(old('blood_group', $getRecord->blood_group) == 'O+') selected @endif>O+</option>
                        <option value="O-" @if(old('blood_group', $getRecord->blood_group) == 'O-') selected @endif>O-</option>
                    </select>
                    <div style="color:red">{{ $errors->first('blood_group')}}</div>
                </div>


                <div class="form-group col-md-6">
                    <label>Height <span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height) }}" placeholder="Height (cm)">
                    <div style="color:red">{{ $errors->first('height')}}</div>

                  </div>

                <div class="form-group col-md-6">
                    <label>Weight <span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight) }}" placeholder="Weight (kg)">
                    <div style="color:red">{{ $errors->first('weight')}}</div>

                </div>




                    </div>
<hr />

                  <div class="form-group">
                    <label >Email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" value="{{ old('email', $getRecord->email)}}" name="email" Required placeholder="Enter email">
                    <div style="color:red">{{ $errors->first('email')}}</div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
