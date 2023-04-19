@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Müşderi {{ "#{$customer->id} - $customer->full_name" }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Familiýasy we ady</td>
                    <td>{{ $customer->full_name }}</td>
                </tr>
                <tr>
                    <td>Suraty</td>
                    <td><img height="100" width="auto" src="{{ '/storage/' . $customer->photo }}" alt=""></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <td>Telefon</td>
                    <td>{{ $customer->mobile }}</td>
                </tr>
                <tr>
                    <td>Salgysy</td>
                    <td>{{ $customer->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
  </div>
@endsection
