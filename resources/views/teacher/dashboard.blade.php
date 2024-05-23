@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Display Total Subjects -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalStudents }}</h3>
                            <p>Total Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-book"></i>
                        </div>
                        <!-- You can remove the link if not needed -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Display Total of My Class & Subject -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $classSubject }}</h3>
                            <p>Total of My Class & Subject</p>
                        </div>
                        <div class="icon">
                         
                        </div>
                        <!-- You can remove the link if not needed -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
