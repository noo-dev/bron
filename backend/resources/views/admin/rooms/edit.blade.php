@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag görnüşini üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('room-types.update', $room->id) }}">
            @csrf
            @method('PUT')
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
            <label for="title">Otagyn ady</label>
            <input type="text" class="form-control" value="{{ $room->title }}" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
                <label for="room_type_id">Görnüşi</label>
                <select name="room_type_id" id="room_type_id" class="form-control">
                    @foreach($roomtypes as $rt)
                        <option
                            value="{{ $rt->id }}"
                            @if($room->room_type_id === $rt->id) selected @endif
                            >
                            {{ $rt->title }}
                        </option>
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
