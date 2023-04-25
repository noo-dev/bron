@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag görnüşini goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('room-types.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
            <label for="title">Görnüşiň ady</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="">
            </div>
            <div class="form-group">
            <label for="price">Bahasy</label>
            <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="details">Giňişleýin...</label>
                <textarea class="form-control" name="details" id="tetails" cols="100" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="imamges">Suratlar</label>
                <input type="file" multiple name="images[]" >
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
