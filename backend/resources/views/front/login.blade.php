@extends('front.layout')

@section('content')
<div class="container my-5 ">
    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="{{ route('login.form') }}" method="POST" class="contact-form">
                @csrf
                <div class="">
                    <input type="text" placeholder="Adyňyz we familiýaňyz" name="full_name">
                </div>
                <div class="">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="">
                    <input type="text" placeholder="Telefon" name="">
                </div>
                <div class="">
                    <input type="text" placeholder="Salgyňyz">
                </div>
                <div>
                    <p>Suratyňyz</p>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="">
                    <textarea placeholder="Your Message"></textarea>
                    <button type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
