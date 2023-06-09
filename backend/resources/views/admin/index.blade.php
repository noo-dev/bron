@extends('admin.layout')


@section('content')

    <div class="row">
        <div class="col-md-6">
          
        </div>
        <div class="col-md-6"></div>
    </div>

@endsection

@section('scripts')
    <script>
      
      
      $(function() {
        var source = new EventSource('http://localhost:8080/sse')
        source.onmessage = function(e) {
          data = JSON.parse(e.data)
          console.log(data)
          $(document).Toasts('create', {
            class: 'bg-info',
            title: `${data.checkin_date} - ${data.checkout_date}`,
            subtitle: '',
            body: `${data.customer}`
          })
        }
      })
    </script>
@endsection
