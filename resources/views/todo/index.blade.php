@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Todos</h5>

                    <a href="/todos/create" class="btn btn-sm btn-primary">Tambah Todo</a>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    Todo
                                </th>
                                <th data-type="date" data-format="DD/MM/YYYY/">Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>{{ $todo->todo }}</td>
                                    <td>{{ date('d F Y', strtotime($todo->tanggal)) }}</td>
                                    <td>{{ date('H:i', strtotime($todo->jam)) }}</td>
                                    <td>
                                        @if ($todo->status == 'belum')
                                            <span class="text-danger"> {{ ucfirst($todo->status) }}</span>
                                        @elseif ($todo->status == 'sedang')
                                            <span class="text-warning"> {{ ucfirst($todo->status) }} </span>
                                        @elseif ($todo->status == 'sudah')
                                            <span class="text-success"> {{ ucfirst($todo->status) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="/todos/{{ $todo->id }}/edit" class="btn btn-sm btn-success"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/todos/{{ $todo->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger ms-3"
                                                    onclick="return confirm('Apakah {{ $todo->todo }} akan dihapus ')">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
