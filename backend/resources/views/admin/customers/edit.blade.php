@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Müşderi maglumatlaryny üýtgetmek üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('customers.update', $c->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif

            <div class="form-group">
            <label for="full_name">Ady we familiýasy</label>
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="" value="{{ $c->full_name }}">
            </div>
            <div class="form-group">
            <label for="full_name">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="" value="{{ $c->email }}">
            </div>
            <div class="form-group">
            <label for="password">Mobilny</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="" value="{{ $c->mobile }}">
            </div>
            <div class="form-group">
            <label for="photo">Suraty</label>
            <input type="hidden" name="prev_photo" value="{{ $c->photo }}">
            <input type="file" class="form-control" name="photo" id="photo">
            <img src="{{ asset('storage/' . $c->photo) }}" alt="" width="200" height="200" {{-- style="object-fit: contain" --}}>
            </div>
            <div class="form-group">
                <label for="address">Salgysy</label>
                <textarea name="address" id="address" class="form-control" cols="30" rows="5">{{ $c->address }}</textarea>
            </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Üýtgetmek</button>
        </div>
        </form>
  </div>
@endsection
