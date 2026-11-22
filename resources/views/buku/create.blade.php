@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <p>
            <label>Kode Buku</label><br>
            <input type="text" name="kode_buku"
                   value="{{ old('kode_buku') }}">
        </p>

        <p>
            <label>Judul Buku</label><br>
            <input type="text" name="judul"
                   value="{{ old('judul') }}">
        </p>

        <p>
            <label>Penulis</label><br>
            <input type="text" name="penulis"
                   value="{{ old('penulis') }}">
        </p>

        <p>
            <label>Tahun Terbit</label><br>
            <input type="number" name="tahun_terbit"
                   value="{{ old('tahun_terbit') }}">
        </p>

        <p>
            <label>Stok</label><br>
            <input type="number" name="stok"
                   value="{{ old('stok') }}">
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('buku.index') }}">Kembali</a>
    </form>
@endsection