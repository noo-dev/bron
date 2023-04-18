@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag {{ $rt->id }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table>
                <tr>
                    <td>Ady</td>
                    <td>{{ $rt->title }}</td>
                </tr>
                <tr>
                    <td>Maglumat</td>
                    <td>{{ $rt->details }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>
@endsection
