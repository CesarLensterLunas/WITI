@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Admin</h1>
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
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>School Year</label>
                                    <input type="text" class="form-control" id="school_year" value="2023-2024" name="name" required readonly placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="number" class="form-control" id="start_date" name="start_date" required placeholder="Enter start date" oninput="updateSchoolYear()">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <script>
                            function updateSchoolYear() {
                                var startDate = parseInt(document.getElementById('start_date').value);
                                var endDate = startDate + 1;
                                document.getElementById('school_year').value = startDate + "-" + endDate;
                            }
                        </script>
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
