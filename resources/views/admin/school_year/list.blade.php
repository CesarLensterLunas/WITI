@extends('layouts.app')

@section('content')
<script>
    function updateStatus(selectElement) {
        let status = selectElement.value;
        let url = "{{ route('update.accounts.status') }}";
        let formData = new FormData();
        formData.append('status', status);

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
            } else {
                alert('Failed to update status.');
            }
        })
        // .catch(error => {
        //     console.error('Error:', error);
        //     alert('An error occurred.');
        // });
    }
</script>

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

                    @if (session('success'))
                        <div>{{ session('success') }}</div>
                    @endif


                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <form method="POST" action="{{ route('update.accounts.status') }}">
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

                                        <td></td>
                                        <td>

                                            <select class="statusSelect" onchange="updateStatus(this)">

                                                <option value="0" {{ $value->status == '0' ? 'selected' : '' }}>Active</option>
                                                    <option value="1" {{ $value->status == '1' ? 'selected' : '' }}>Inactive</option>

                                            </select>

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
                </form>
            </div>
    </div>
    </section>
    </div>
@endsection
