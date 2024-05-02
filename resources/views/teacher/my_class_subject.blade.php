@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> My Class & Subject  
             
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.col -->
          

            <!-- general form elements -->

            @include('_message')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Class & Subject</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th>Class Name</th>
                                <th>Subject Name</th>   
                                <th>Subject Type</th> 
                                <th>Created Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($getRecord as $value)
                           
                               <td>{{ $value->class_name }}</td>
                               <td>{{ $value->subject_name }}</td>
                               <td>{{ $value->subject_type }}</td>

 
                              <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                           </tr>
                                 @endforeach
         </tbody>
                    </table>
                   
                    </div>
                    <!-- Additional content if needed -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
</div>
@endsection
