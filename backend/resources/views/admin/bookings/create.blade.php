@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
                <label for="user_id">Müşderini saýla: </label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="checkin_date">Başlanýan senesi</label>
                <input type="date" name="checkin_date" id="checkin_date" />
            </div>
            <div class="form-group">
                <label for="checkout_date">Başlanýan senesi</label>
                <input type="date" name="checkout_date" id="checkout_date" />
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
  </div>
@endsection
