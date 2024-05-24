@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Subject </h1>
          </div>



        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

          <!-- /.col -->
          <div class="col-md-12">



            <!-- /.cardSADASDASDASDASDSDASDASDASDKJHQW  OI;HDE OUQWHUDOHQOUWHDAUHSDIKUAHSDILUAHSDIOUAS -->
            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Subject</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     <th>Subject Code</th>

                      <th>Subject Name</th>

                      <th>Schedule</th>
                      <th>Units</th>
                      <th>Teacher</th>
                      <th>Room</th>

                    </tr>

                  </thead>
                  <tbody>
                  <tbody>
    @foreach ($getRecord as $value)
        <tr>
            <td>{{ $value->subject_code }}</td>
            <td>{{ $value->subject_name }}</td>
            <!-- Placeholder for schedule -->
            <td>Monday 9:00 AM - 11:00 AM</td>
            <td>{{ $value->units }}</td>
        </tr>
    @endforeach

    <!-- Additional subjects with placeholder schedules -->


    <tr>
        <td>COMP101</td>
        <td>Introduction to Computer Science</td>
        <td>Tuesday 1:00 PM - 3:00 PM</td>
        <td>3</td>
        <td>Mr.Lumberto</td>
        <td>Computer Lab 2</td>
    </tr>
    <tr>
        <td>MATH201</td>
        <td>Calculus I</td>
        <td>Wednesday 10:00 AM - 12:00 PM</td>
        <td>4</td>
        <td>Mrs. Lee</td>
        <td>Classroom 202</td>


    </tr>
    <tr>
        <td>PHYS101</td>
        <td>Physics Fundamentals</td>
        <td>Thursday 2:00 PM - 4:00 PM</td>
        <td>3</td>
        <td>Ms. Natividad</td>
        <td>Classroom 201</td>
    </tr>
    <tr>
        <td>ENG101</td>
        <td>English Composition</td>
        <td>Friday 9:00 AM - 11:00 AM</td>
        <td>3</td>
        <td>Mrs. Gonzalez</td>
        <td>Classroom 205</td>
    </tr>
    <tr>
        <td>HIST101</td>
        <td>World History</td>
        <td>Monday 2:00 PM - 4:00 PM</td>
        <td>3</td>
        <td>Ms. Flores</td>
        <td>Classroom 207</td>
    </tr>
    <tr>
        <td>BIO101</td>
        <td>Introduction to Biology</td>
        <td>Tuesday 10:00 AM - 12:00 PM</td>
        <td>4</td>
        <td>Mr. Martinez</td>
        <td>Classroom 202</td>

    </tr>

</tbody>

</tbody>




                </table>

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




