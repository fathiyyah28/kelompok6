<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pengguna = Pengguna::when($search, function($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('pengguna.index', compact('pengguna'));
    }

    public function create()
    {
        return view('pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna',
            'role' => 'required',
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna ditambahkan!');
    }

    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'role' => 'required',
        ]);

        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna diperbarui!');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna dihapus!');
    }
}
