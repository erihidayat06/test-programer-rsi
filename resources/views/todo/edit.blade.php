@extends('layouts.main')

@section('content')
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">
                Edit Todo
            </h5>
            <form action="/todos/{{ $todo->id }}" method="POST">
                @csrf
                @method('PUT')


                {{-- Todo --}}
                <label for="todo" class="form-label mt-3">Todo</label>
                <input type="text" name="todo" id="todo" class="form-control @error('todo') is-invalid @enderror"
                    value="{{ old('todo', $todo) }}">
                @error('todo')
                    <div id="todoFeedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                @enderror

                {{-- Tanggal --}}
                <label for="tanggal" class="form-label mt-3">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $todo) }}">
                @error('tanggal')
                    <div id="tanggalFeedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                @enderror

                {{-- Time --}}
                <label for="jam" class="form-label mt-3">Jam</label>
                <input type="time" name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror"
                    value="{{ old('jam', $todo) }}">
                @error('jam')
                    <div id="todoFeedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                @enderror
                <label for="status" class="form-label mt-3">Status</label>
                <select class="form-select" aria-label="Default select example" id="status" name="status">
                    <option value="belum" {{ old('status') == 'belum' ? 'selected' : '' }}>Belum</option>
                    <option value="sedang" {{ old('status') == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="sudah" {{ old('status') == 'sudah' ? 'selected' : '' }}>Sudah</option>
                </select>

                @error('status')
                    <div id="todoFeedback" class="invalid-feedback">
                        {{ $message }}.
                    </div>
                @enderror

                <button class="btn btn-primary mt-5">Simpan</button>
            </form>
        </div>
    </div>
@endsection
