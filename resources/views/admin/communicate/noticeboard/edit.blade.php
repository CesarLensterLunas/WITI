@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Notice Board</h1>
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
             
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="">
              {{csrf_field()}}
                <div class="card-body">
                <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $getRecord->title }}" required placeholder="Title">
                    </div>

                  <div class="form-group">
                        <label>Notice Date</label>
                        <input type="date" class="form-control" value="{{ $getRecord->notice_date }}" name="notice_date" required>
                    </div>
                    <div class="form-group">
                        <label>Publish Date</label>
                        <input type="date" class="form-control" value="{{ $getRecord->publish_date }}" name="publish_date" required>
                    </div>

                    @php
                        $message_to_student = $getRecord->getMessageToSingle($getRecord->id, 3); 
                        $message_to_teacher = $getRecord->getMessageToSingle($getRecord->id, 2);
                    @endphp

                    <div class="form-group">
                        <label style="display: block;">Message To</label>
                        <label>
                            <input {{ !empty($message_to_teacher) ? 'checked' : '' }} type="checkbox" value="2" name="message_to[]"> Teacher
                        </label>

                        <label style="margin-right: 50px;">
                            <input {{ !empty($message_to_student) ? 'checked' : '' }} type="checkbox" value="3" name="message_to[]"> Student
                        </label>
                        
                    </div>



                  <div class="form-group">
                    <label>Message</label>
                    <textarea id="compose-textarea" class="form-control"  name="message" style="height: 300px">{{ $getRecord->message }}</textarea>
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

@endsection    
@section('script')
<script src="{{ url('public/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#compose-textarea').summernote({height:200});
        
    });
</script>
@endsection
