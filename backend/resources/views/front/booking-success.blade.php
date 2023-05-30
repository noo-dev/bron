@extends('front.layout')

@section('content')
    <div class="container my-5" style="min-height: 400px">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card border border-success">
                    <div class="card-body">
                        <div class="card-text text-success text-center">Töleg üstünlikli amala aşyryldy</div>
                            <a href="{{ route('download.ticket', ['id' => $booking->id]) }}" class="btn btn-success">Biledi ýüklemek</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection