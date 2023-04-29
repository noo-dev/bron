@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Işgär goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('staffs.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
            <label for="full_name">Familiýasy we ady</label>
            <input type="text" class="form-control" name="full_name" id="full_name">
            </div>
            <div class="form-group">
                <label for="department_id">Bölümi saýla</label>
                <select class="form-control" name="department_id" id="department_id">
                    @foreach ($departments as $dep)
                        <option
                            value="{{ $dep->id }}"
                        >{{ $dep->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Suraty</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <label for="bio">Maglumat</label>
                <textarea name="bio" id="bio" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="salary_type">Toleg gornusi: </label>
                <input type="radio" name="salary_type" value="daily"> Günlük
                <input type="radio" name="salary_type" value="monthly"> Aýlyk
            </div>
            <div class="form-group">
                <label for="salary_amt">Toleg mukdary</label>
                <input type="number" name="salary_amt" id="salary_amt" class="form-control">
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
