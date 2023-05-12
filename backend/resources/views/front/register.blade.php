@extends('front.layout')

@section('content')
<div class="container my-5 ">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="offset-md-3 col-md-6">
            <form action="{{ route('customers.store') }}" method="post" class="contact-form">
                @csrf
                <div class="">
                    <input type="text" placeholder="Adyňyz we familiýaňyz" name="full_name">
                </div>
                <div class="">
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="">
                    <input type="password" placeholder="Parol" name="password">
                </div>
                <div class="">
                    <input type="text" placeholder="Telefon" name="mobile">
                </div>
                <div class="">
                    <input type="text" placeholder="Salgyňyz" name="address">
                </div>
                <div>
                    <p>Suratyňyz</p>
                    <input type="file" name="photo" id="photo">
                </div>
                <input type="hidden" name="ref" value="front">
                <div class="">
                    <button type="submit">Registrasiya</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
