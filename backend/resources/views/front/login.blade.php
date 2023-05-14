@extends('front.layout')

@section('content')
<div class="container my-5 ">
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="{{ route('login.post') }}" method="POST" class="contact-form">
                @csrf
                <div class="">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="">
                    <input type="password" placeholder="Parol" name="password">
                </div>
                <div class="">
                    <button type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
