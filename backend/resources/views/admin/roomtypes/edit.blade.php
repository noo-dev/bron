@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag görnüşini üýtget</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('room-types.update', $rt->id) }}" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="images">Surat goşmak</label>
                <input type="file" multiple class="form-control" name="images[]" id="images">
            </div>
            <div class="d-flex">
                <label>Suratlar</label>
                @foreach($rt->images as $img)
                    <div class="mr-5">
                        <img src="{{ asset('storage/' . $img->img_src) }}" alt="{{ $img->img_alt }}" height="200" />
                        <p class="mt-2">
                            <button
                                class="btn btn-danger btn-sm delete-img"
                                onclick="return confirm('Siz hakykatdanam bu suraty ocurmekcimi?')"
                                data-img_id="{{ $img->id }}"
                                type="button"
                            ><i class="fa fa-trash"></i></button>
                        </p>
                    </div>
                @endforeach
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
