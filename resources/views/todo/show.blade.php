@extends('layouts.main')

@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Data {{ $todo->todo }}</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $todo->todo }}</li>
                    <li class="list-group-item">{{ date('d F Y', strtotime($todo->tanggal)) }}</li>
                    <li class="list-group-item">{{ date('H:i', strtotime($todo->jam)) }}</li>
                    <li class="list-group-item">
                        @if ($todo->status == 'belum')
                            <span class="text-danger"> {{ ucfirst($todo->status) }}</span>
                        @elseif ($todo->status == 'sedang')
                            <span class="text-warning"> {{ ucfirst($todo->status) }} </span>
                        @elseif ($todo->status == 'sudah')
                            <span class="text-success"> {{ ucfirst($todo->status) }}</span>
                        @endif
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
