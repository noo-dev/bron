@extends('front.layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card border border-success">
                    <div class="card-body">
                        <div class="card-text text-success text-center">Töleg üstünlikli amala aşyryldy</div>
                        <form action="{{ route('download.ticket', ['id' => $booking->id]) }}" method="get">
                            @csrf
                            <button class="btn btn-success">Biledi ýüklemek</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection