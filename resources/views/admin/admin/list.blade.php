@extends('layouts.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin List (Total: {{ $getRecord->total() }})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
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

                                <th>Profile Pic</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $value)
                            <tr>

                                <td>
                                @if(!empty($value->getProfile()))
                                <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">
                                @endif
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="confirmDelete('{{ url('admin/admin/Delete/'.$value->id) }}')" class="btn btn-danger">Delete</a>

                                    <script>
                                        function confirmDelete(deleteUrl) {
                                            if (confirm("Are you sure you want to delete this admin?")) {
                                                // If user confirms deletion, proceed with the deletion action
                                                window.location.href = deleteUrl;
                                            } else {
                                                // If user cancels, do nothing
                                                return false;
                                            }
                                        }
                                    </script>

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
