@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assign Class Teacher </h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Add New Assign Class Teacher </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- general form elements -->
            
           

            @include('_message')

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assign Class Teacher List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Teacher Name</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
    @foreach($getRecord as $value)
    <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->class_name }}</td>
        <td>{{ $value->teacher_name }}</td>
        <td>
            @if($value->status == 'Active')
            Active
            @else
            Inactive
            @endif
        </td>
        <td>{{ $value->created_by_name }}</td>
        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
        <td></td>
    </tr>
    @endforeach
</tbody>
</table>
<div style="padding: 10px; float: right;">
    {!! $getRecord->appends(request()->except('page'))->links() !!}
</div>

                        <!-- Additional content if needed -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
</div>
@endsection
