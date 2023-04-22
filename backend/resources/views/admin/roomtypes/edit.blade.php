@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag görnüşini üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('room-types.update', $rt->id) }}">
            @csrf
            @method('PUT')
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
                <label for="title">Görnüşiň ady</label>
                <input type="text" class="form-control" value="{{ $rt->title }}" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
                <label for="price">Bahasy</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $rt->price }}">
            </div>
            <div class="form-group">
                <label for="details">Giňişleýin...</label>
                <textarea class="form-control" name="details" id="tetails" cols="100" rows="10">{{ $rt->details }}</textarea>
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
