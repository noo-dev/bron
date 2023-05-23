@extends('front.layout')

@php $user = session('user') @endphp

@section('content')
    <div class="container my-5">
        <h2 class="display-4">{{ session('user')->full_name }}</h2>
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="">Bronlar</h3>
            </div>
            <div class="card-body">
                @if ($user->bookings->count() > 0)
                    <div class="list-group">
                        @foreach ($user->bookings as $booking)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p><strong>Senesi: </strong>{{ $booking->checkin_date }} - {{ $booking->checkout_date }}</p>
                                <a href="{{ route('download.ticket', ['id' => $booking->id]) }}" target="_blank" class="btn btn-info">Ýükle <i class="fa fa-download"></i></a>
                            </li>
                        @endforeach
                    </div>
                @else
                    Şu wagtlykça size degişli bronlar ýok
                @endif
            </div>
        </div>
    </div>
@endsection