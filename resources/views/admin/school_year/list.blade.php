@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Year</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">

                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Search Admin</h3>
                </div>
                <form method="get" action="">
                    <div class="card-body">
                      <div class="row">

                    <div class="form-group col-md-3">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name"  placeholder="Name">
                      </div>

                      <div class="form-group col-md-3">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="email">
                      </div>
                      <div class="form-group col-md-3">
                         <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                         <a href=" {{ url('admin/class/list')}}"  class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>
                    </div>
                  </form> --}}

            </div>
            @include('_message')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin List</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th>School year</th>

                                <th>Semester</th>
                                <td>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                            <tr>
                                 <td>{{ $value->school_year }}</td>
                                <td>{{ $value->sem }}</td>
                                <td>
                                <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                 <td>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
