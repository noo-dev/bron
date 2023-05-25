@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <form action="">
                <div class="form-group">
                    <label for="date">Senesi: </label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Barla</button>

                
            </form>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Adaty</h2>
                    <div class="d-flex justify-content-between" style="font-size: 25px">
                        @foreach ($adatyRooms as $room)
                            <span 
                                class="badge @if(in_array($room->id, $arr, false)) bg-primary @endif"
                                >{{ $room->title }}</span>    
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Premium</h2>
                    <div class="d-flex justify-content-between" style="font-size: 25px">
                        
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h2>Lýuks</h2>
                    <div class="d-flex justify-content-between" style="font-size: 25px">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection