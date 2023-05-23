<!DOCTYPE html>
<html>
<head>
    <title>Bilet</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: 'DejaVu Sans';
        }
    </style>
</head>
<body>
    <h1>Siziň bilediňiz</h1>
    
    <p>Günler: {{ $booking->checkin_date }} - {{ $booking->checkout_date }}</p>
    <p>Uly adamlar: {{ $booking->total_adults }}</p>
    @if ($booking->total_children)
        <p>Çagalar: {{ $booking->total_children }}</p>    
    @endif
    <p>Otag tipi: {{ $booking->room->roomtype->title }}</p>
    <p>{{ $booking->room->roomtype->price }}</p>
</body>
</html>