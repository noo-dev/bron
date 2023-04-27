@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Isgar: {{ $staff->full_name }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Familiýasy we ady</td>
                    <td>{{ $staff->full_name }}</td>
                </tr>
                <tr>
                    <td>Bölümi</td>
                    <td>{{ $staff->department->title }}</td>
                </tr>
                <tr>
                    <td>Suraty</td>
                    <td><img src="{{ asset('storage/' . $staff->photo) }}" width="100" height="100" /></td>
                </tr>
                <tr>
                    <td>Maglumat</td>
                    <td>{{ $staff->bio }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>
@endsection
