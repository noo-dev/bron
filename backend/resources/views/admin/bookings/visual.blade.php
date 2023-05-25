@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-2">
            <form action="{{ route('checkByDate') }}">
                @csrf
                <div class="form-group">
                    <label for="date">Senesi: </label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Barla</button>

                
            </form>
        </div>
        
    </div>
    
@endsection