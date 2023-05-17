@extends('front.layout')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero-section">
        @if ($errors->any())
            <div class="alert alert-danger" style="z-index: 100">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Otel BRON</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eaque illo nobis tenetur quis fuga eum. Consequuntur hic laboriosam ipsa!</p>
                        <a href="#" class="primary-btn">Giňişleýin</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Bron</h3>
                        <form action="{{ route('bookings.store') }}" method="post">
                            @csrf
                            <div class="check-date">
                                <label for="date-in">Başlaýan wagty:</label>
                                <input type="text" class="date-input" id="date-in" name="checkin_date">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Gutarýan wagty:</label>
                                <input type="text" class="date-input" id="date-out" name="checkout_date">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="adults">Uly adam sany:</label>
                                <select id="adults" name="total_adults">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="children">Çaga sany:</label>
                                <select id="children" name="total_children">
                                    <option data-display="-"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room_type">Otag görnüşi:</label>
                                <select id="room_type" name="rooms_type">
                                    <option value="all">Hemmesi</option>
                                    @foreach ($rts as $rt)
                                    <option value="{{ $rt->id }}">{{ $rt->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="available-rooms">Elýeterli otaglar:</label>
                                <select id="available-rooms" name="room_id">
                                </select>
                            </div>
                            <input type="hidden" name="user_id" value="{{ session('data') ? session('data')[0]['id'] : '' }}">
                            <input type="hidden" name="room_price" id="room_price" value="">
                            <input type="hidden" name="ref" value="front">
                            <div class="d-flex">
                                <button class="check-btn" type="button">Barla</button>
                                <button type="submit">Bronla</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset("/front/img/hero/hero-1.jpg") }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset("/front/img/hero/hero-2.jpg") }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset("/front/img/hero/hero-3.jpg") }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->



@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var availableRooms = $('#available-rooms');
            $('button.check-btn').on('click', function(e) {
                _btn = $(this)
                _btn.text('Garaşyň...').prop('disabled', true)
                availableRooms.empty();
                var _in = $('#date-in').val();
                var _out = $('#date-out').val();
                var _type = $('#room_type').val();
                _in = moment(_in).format('YYYY-MM-DD');
                _out = moment(_out).format('YYYY-MM-DD');
                $.ajax({
                url: "{{ url('/adminka/bookings/check/available-rooms') }}" + `?in=${_in}&out=${_out}&type=${_type}`,
                method: "get",
                dataType: "json",
                beforeSend: function() {
                    availableRooms.html('<option>Ýüklenýär<option>');
                },
                success: function(res) {
                    availableRooms.empty();
                    console.log(res)
                    var str = '<option data-display="Otag saýlaň">Otaglar</option>';
                    res.forEach(function(item) {
                        str += `<option data-price="${item.room_price}" value="${item.id}"><strong>${item.roomtype} - </strong>${item.title}</option>`;
                    });
                    availableRooms.append(str).niceSelect('update');
                    _btn.text('Barla').prop('disabled', false)
                },
                error: function(e) {
                    _btn.text('Barla').prop('disabled', false)
                }
            });
        });

        $(document).on('change')

        });
    </script>
@endsection
