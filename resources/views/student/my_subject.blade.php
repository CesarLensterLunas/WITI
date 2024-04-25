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
                     
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      
                    </tr>
                   
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                      <td> {{ $value->subject_name}}</td>
                      <td> {{ $value->subject_type}}</td>

                      </tr>
 
                      @endforeach
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




