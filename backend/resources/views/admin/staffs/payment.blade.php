@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Töleg goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('staffs.payment.store', $staff_id) }}">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
                <label for="amount">Mukdary</label>
                <input type="text" class="form-control" name="amount" id="amount">
            </div>
            <div class="form-group">
                <label for="amount">Tölenen senesi</label>
                <input type="date" class="form-control" name="payment_date" id="payment_date">
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
