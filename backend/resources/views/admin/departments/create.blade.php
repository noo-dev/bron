@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Bölüm goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
            <label for="title">Bölümiň ady</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
                <label for="details">Giňişleýin...</label>
                <textarea class="form-control" name="details" id="tetails" cols="100" rows="10"></textarea>
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
