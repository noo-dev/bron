@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag {{ $room->id }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Ady</td>
                    <td>{{ $room->title }}</td>
                </tr>
                <tr>
                    <td>Otag görnüşi</td>
                    <td>Premium</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>
@endsection
