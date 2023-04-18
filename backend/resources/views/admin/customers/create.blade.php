@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('rooms.store') }}">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
            <label for="title">Otagyň ady</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
                <label for="room_type_id">Otagyň görnüşi</label>
                <select class="form-control" name="room_type_id" id="room_type_id">
                    @foreach ($roomtypes as $rt)
                        <option value="{{ $rt->id }}">{{ $rt->title }}</option>
                    @endforeach
                </select>
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
