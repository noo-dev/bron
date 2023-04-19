@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Müşderi goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
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
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="">
            </div>
            <div class="form-group">
            <label for="full_name">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
            <label for="password">Parol</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <div class="form-group">
            <label for="password">Mobilny</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="">
            </div>
            <div class="form-group">
            <label for="photo">Suraty</label>
            <input type="file" class="form-control" name="photo" id="photo" placeholder="">
            </div>
            <div class="form-group">
                <label for="address">Salgysy</label>
                <textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
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
