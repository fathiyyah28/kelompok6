@extends('tampilan.main')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pengguna</h2>
    <form method="POST" action="{{ route('pengguna.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role:</label>
            <input type="text" name="role" class="form-control" value="{{ old('role') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
