@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student List (Total : {{ $getRecord->total()}})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
           <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New Student</a> 
          </div>

          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
   
          <!-- /.col -->
          <div class="col-md-12">


            
             
        
            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ date ('d-m-Y H:i A',strtotime($value->created_at)) }}</td>
                      <td> 
                      <a href="{{ url('admin/student/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ url('admin/student/Delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                       </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding; 10px;  float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection    

