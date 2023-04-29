@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Işgär maglumatlaryny üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('staffs.update', $staff->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if (Session::has('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @endif
                <div class="form-group">
                <label for="full_name">Familiýasy we ady</label>
                <input type="text" class="form-control" name="full_name" id="full_name" value="{{  }}">
                </div>
                <div class="form-group">
                    <label for="department_id">Bölümi saýla</label>
                    <select class="form-control" name="department_id" id="department_id">
                        @foreach ($departments as $dep)
                            <option
                                value="{{ $dep->id }}"
                                @if($staff->staff_department_id === $dep->id) selected @endif
                            >{{ $dep->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Suraty</label>
                    <input type="file" name="photo" class="form-control">
                    <input type="hidden" name="prev_photo" value="{{ $staff->photo }}" />
                    <img src="{{ asset('storage/' . $staff->photo) }}" width="100" height="100" style="object-fit: contain" />
                </div>
                <div class="form-group">
                    <label for="bio">Maglumat</label>
                    <textarea name="bio" id="bio" class="form-control">{{ $staff->bio }}</textarea>
                </div>
                <div class="form-group">
                    <label for="salary_type">Toleg gornusi: </label>
                    <input type="radio" name="salary_type" value="daily" @if($staff->salary_type ==== 'daily') checked @endif> Günlük
                    <input type="radio" name="salary_type" value="monthly" @if($staff->salary_type ==== 'daily') checked @endif> Aýlyk
                </div>
                <div class="form-group">
                    <label for="salary_amt">Toleg mukdary</label>
                    <input type="number" name="salary_amt" id="salary_amt" class="form-control" value="{{ $staff->salary_amt }}">
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
