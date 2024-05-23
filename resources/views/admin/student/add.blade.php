<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title :''}} - Cresmanage Hub </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('public/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('public/plugins/summernote/summernote-bs4.min.css') }}">\
  <link rel="stylesheet" href="{{ url('public/plugins/fullcalendar/main.css') }}">

</head>
<body>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-10">

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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action=""enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="card-body">
                    <div class=row>
                    <div class="form-group col-md-6">
                    <label >First Name <span style="color: red;">*</span></label>
                    <input type="Text" class="form-control" value="{{ old('name')}}" name="name" Required placeholder="First Name">
                    <div style="color:red">{{ $errors->first('name')}}</div>
                  </div>

                  <div class="form-group col-md-6">
                    <label >Last Name <span style="color: red;">*</span></label>
                    <input type="Text" class="form-control" value="{{ old('last_name')}}" name="last_name" Required placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('last_name')}}</div>
                  </div>







                    <div class="form-group col-md-6">
                        <label>Gender <span style="color: red;">*</span></label>
                        <select class="form-control" required name="gender">
                            <option {{ (old('gender') == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                            <option  {{ (old('gender') == 'Femaale') ? 'selected' : ''}} value="Female">Female</option>

                        </select>
                        <div style="color:red">{{ $errors->first('gender')}}</div>

                    </div>
                    <div class="form-group col-md-6">
                        <label>Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" required value="{{ old('date_of_birth') }}" name="date_of_birth">
                        <div style="color:red">{{ $errors->first('date_of_birth')}}</div>

                    </div>
                    <div class="form-group col-md-6">
    <label>Mobile Number <span style="color: red;">*</span></label>
    <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Mobile Number">
    <div style="color:red">{{ $errors->first('mobile_number')}}</div>
</div>


                <div class="form-group col-md-6">
                    <label>Admission Date <span style="color: red;">*</span></label>
                    <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
                    <div style="color:red">{{ $errors->first('admission_date')}}</div>

                </div>

                <div class="form-group col-md-6">
                    <label>Profile Pic <span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color:red">{{ $errors->first('profile_pic')}}</div>

                </div>

                <div class="form-group col-md-6">
                    <div class="form-group col-md-6">
                        <label>Blood Type <span style="color: red;"></span></label>
                        <select class="form-control" name="blood_group">
                            <option value="">Select Blood Type</option>
                            <option value="A" {{ (old('blood_group') == 'A') ? 'selected' : '' }}>A</option>
                            <option value="B" {{ (old('blood_group') == 'B') ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ (old('blood_group') == 'AB') ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ (old('blood_group') == 'O') ? 'selected' : '' }}>O</option>
                            <option value="A+" {{ (old('blood_group') == 'A+') ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ (old('blood_group') == 'A-') ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ (old('blood_group') == 'B+') ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ (old('blood_group') == 'B-') ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ (old('blood_group') == 'AB+') ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ (old('blood_group') == 'AB-') ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ (old('blood_group') == 'O+') ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ (old('blood_group') == 'O-') ? 'selected' : '' }}>O-</option>
                        </select>
                        <div style="color:red">{{ $errors->first('blood_group') }}</div>
                    </div>
    <div style="color:red">{{ $errors->first('blood_group')}}</div>
</div>


                <div class="form-group col-md-6">
                    <label>Height <span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="height" value="{{ old('height') }}" placeholder="Height">
                    <div style="color:red">{{ $errors->first('height')}}</div>

                  </div>

                <div class="form-group col-md-6">
                    <label>Weight <span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="weight" value="{{ old('weight') }}" placeholder="Weight">
                    <div style="color:red">{{ $errors->first('weight')}}</div>

                </div>
                  <div class="form-group col-md-6" >
                    <label >Email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" value="{{ old('email')}}" name="email" Required placeholder="Enter email">
                    <div style="color:red">{{ $errors->first('email')}}</div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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


</body>
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y')}}</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

