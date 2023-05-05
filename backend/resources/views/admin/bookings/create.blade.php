@extends('admin.layout')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Otag goş</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="form-group">
                <label for="user_id">Müşderini saýla: </label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="checkin_date">Başlanýan senesi</label>
                <input type="date" name="checkin_date" id="checkin_date" class="form-control checkindate" />
            </div>
            <div class="form-group">
                <label for="checkout_date"> Tamamlanýan senesi</label>
                <input type="date" name="checkout_date" id="checkout_date" class="form-control checkoutdate" />
            </div>
            <div>
                <button id="ajax-btn" class="btn btn-info">Barla!</button>
            </div>
            <div class="form-group">
                <label>Elýeterli otaglar</label>
                <select name="room_id" class="form-control room-list">
                </select>
            </div>
            <div class="form-group">
                <label for="total_adults">Uly adamlar</label>
                <input type="number" name="total_adults" id="total_adults" />
            </div>
            <div class="form-group">
                <label for="total_children">Çagalar</label>
                <input type="number" name="total_children" id="total_children" />
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
        $('.checkindate').on('change', function() {
            var _checkindate = $(this).val();
            // Ajax
            $.ajax({
                url: "{{ url('adminka/bookings') }}/" + _checkindate + "/available-rooms",
                method: "get",
                dataType: "json",
                success: function(res) {
                    $('select.room-list').empty();
                    var data = '';
                    res.forEach(element => {
                        data += `<option value="${element.id}">${element.title}</option>`
                    });
                    $('select.room-list').append(data)
                }
            });


        }); // end of $('.checkindate')

        $('#ajax-btn').on('click', function(e) {
            e.preventDefault();
            var __checkin = $('#checkin_date').val();
            var __checkout = $('#checkout_date').val();
            if (__checkin !== '' && __checkout !== '') {
                $.ajax({
                url: "{{ url('adminka/bookings/check/available-rooms') }}" + `?in=${__checkin}&out=${__checkout}`,
                method: "get",
                dataType: "json",
                success: function(res) {
                    $('select.room-list').empty();
                    var data = '';
                    res.forEach(element => {
                        data += `<option value="${element.id}">${element.title}</option>`
                    });
                    $('select.room-list').append(data)
                }
            });
            }
        });
    });
  </script>
@endsection
