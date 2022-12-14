@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-header">
        <h5 class="mb-0 text-center">Data Ruang</h5>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </div>
    <div class="card-body">
        <a href="{{route('ruang.create')}}" class="btn btn-success">Add Data</a>
        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ruang</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col" width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruang as $room)
                <tr>

                    <td>{{ $loop->iteration}}
                    <td>{{ $room->nama_ruang}}
                    <td>{{ $room->kapasitas}}
                    <td>
                        <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('ruang.edit', $room->id)}}" class="btn btn-warning">Edit</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('ruang.show', $room->id)}}" class="btn btn-info">Show</a>
                                </div>
                                <div class="col-4">
                                    <form action="{{route('ruang.destroy', $room->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus ruangan ini ?')">Delete</button>
                                    </form>
                                </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable({
        dom: 'Bfrtip'
    });
    });
</script>
@endsection