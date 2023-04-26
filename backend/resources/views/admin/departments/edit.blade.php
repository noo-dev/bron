@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Bölümi üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('departments.update', $department->id) }}">
            @csrf
            @method('PUT')
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
                <label for="title">Bölümiň ady</label>
                <input type="text" class="form-control" value="{{ $department->title }}" name="title" id="title" placeholder="">
            </div>

            <div class="form-group">
                <label for="details">Giňişleýin...</label>
                <textarea class="form-control" name="details" id="details" cols="100" rows="10">{{ $department->details }}</textarea>
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


@section('scripts')
  <script>
    $(document).ready(function() {
        $('button.delete-img').on('click', function(e) {
            var img_id = $(this).data('img_id');
            var _vm = $(this);
            $.ajax({
                url: "{{ url('adminka/roomtypeimage/delete') }}/" + img_id,
                data: {

                },
                dataType: 'json',
                beforeSend: function() {
                    _vm.addClass('disabled');
                },
                success: function() {
                    _vm.removeClass('disabled');
                    _vm.closest('div').remove();
                }
            });
        });
    });
  </script>
@endsection
