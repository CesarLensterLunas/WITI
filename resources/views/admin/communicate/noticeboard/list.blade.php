@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Board</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
           <a href="{{ url('admin/communicate/notice_board/add') }}" class="btn btn-primary">Add New Notice Board</a> 
          </div>

          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @include('_message')
    <!-- Main content -->
    <section class="content">
          <div class="col-md-12">
          <div class="card  ">
            <div class="card-header">
                <h3 class="card-title">Search Admin</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">

                  <div class="form-group col-md-2">
                  <label>Title</label>
                  <input type="text" class="form-control" value="{{ Request::get('title') }}" name=" title" placeholder="Title">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Notice Date To</label>
                    <input type="date" class="form-control" name="notice_date_to" value="{{ Request::get('notice_date_to') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Notice Date From</label>
                    <input type="date" class="form-control" name="notice_date_from" value="{{ Request::get('notice_date_from') }}">
                </div>
                <div class="form-group col-md-2">
                      <label>Publish Date To</label>
                      <input type="date" class="form-control" name="publish_date_to" value="{{ Request::get('publish_date_to') }}">
                  </div>
                  <div class="form-group col-md-2">
                      <label>Publish Date From</label>
                      <input type="date" class="form-control" name="publish_date_from" value="{{ Request::get('publish_date_from') }}">
                  </div>
                  <div class="form-group col-md-2">
                      <label>Message To</label>
                      <select class="form-control" name="message_to">
                          <option value="">Select</option>
                          <option value="3" {{ Request::get('message_to') == 3 ? 'selected' : '' }}>Student</option>
                        
                          <option value="2" {{ Request::get('message_to') == 2 ? 'selected' : '' }}>Teacher</option>
                      </select>
                  </div>
                <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="{{ url('admin/communicate/notice_board') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                </div>
                
                </div>
              </form>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Notice Board List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Notice Date</th>
                      <th>Publish Date</th>
                      <th>Message To</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                  </tr>

                  </thead>
                  <tbody>
                  @forelse ($getRecord as $value)
                  <tr>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->title }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->notice_date)) }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->publish_date)) }}</td>
                      <td>
                          @foreach($value->getMessage as $message)
                              @if($message->message_to == 2)
                                  <div>Teacher</div>
                              @elseif($message->message_to == 3)
                                  <div>Student</div>
                              @endif
                          @endforeach
                      </td>
                      <td>{{ $value->created_by_name }}</td>
                      <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                      <td>
                      <a href="{{ url('admin/communicate/notice_board/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ url('admin/communicate/notice_board/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>

                      </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="8">No records found.</td>
                  </tr>
                  @endforelse


                    
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

