@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Admin </h1>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
              {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                    <label >Name</label>
                    <input type="Text" class="form-control" name="name" value="{{ old('name',$getRecord->name) }}" Required placeholder="Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label >Last Name <span style="color: red;">*</span></label>
                    <input type="Text" class="form-control" value="{{ old('last_name', $getRecord->last_name)}}" name="last_name" Required placeholder="Last Name">
                    <div style="color:red">{{ $errors->first('last_name')}}</div>
                  </div>

                </div>


                  <div class="form-group">
                    <label >Email</label>
                    <input type="email" class="form-control" name="email"value="{{ old('email',$getRecord->email)}}"Required placeholder="Enter email">
                    <div style="color:red">{{ $errors->first('email')}}</div>
                </div>



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
