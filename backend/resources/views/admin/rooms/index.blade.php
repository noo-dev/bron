@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Otaglar</h3>
                <a href="{{ route('rooms.create') }}" class="float-right btn btn-success">Täze Otag goşmak</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Ady</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Görnüşi</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data)
                                @foreach($data as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->title }}</td>
                                        <td>{{ $room->roomType->title }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-sm btn-info" href="{{ route('rooms.edit', $room->id) }}"><i class="fa fa-edit"></i></a>
                                            <form method="POST" action="{{ route('rooms.destroy', $room->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <p>Su wagtlykca otaglar girizilmedik</p>
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">Ady</th>
                                <th rowspan="1" colspan="1"></th>
                            </tr>
                        </tfoot>
                        </table>
            </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
