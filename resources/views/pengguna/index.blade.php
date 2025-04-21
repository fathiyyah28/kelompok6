@extends('pengguna.layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Manajemen Pengguna</h3>

        <div class="d-flex justify-content-between mb-3">
            <form class="d-flex" method="GET" action="{{ route('pengguna.index') }}">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari pengguna..." value="{{ request('search') }}">
            </form>
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary">+ Tambah Pengguna</a>
        </div>
        
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td class="text-center">
                    <a href="{{ route('pengguna.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('pengguna.destroy', $item->id) }}" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if ($pengguna->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Belum ada data pengguna.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $pengguna->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
