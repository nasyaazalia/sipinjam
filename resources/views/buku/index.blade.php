@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <h1>Data Buku</h1>

    <a href="{{ route('buku.create') }}">+ Tambah Buku</a>

    <br><br>

    @if (session('sukses'))
        <p style="color: green;">
            {{ session('sukses') }}
        </p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($buku as $item)
                <tr>
                    <td>{{ $buku->firstItem() + $loop->index }}</td>
                    <td>{{ $item->kode_buku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->tahun_terbit }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $item) }}">
                            Ubah
                        </a>

                        <form action="{{ route('buku.destroy', $item) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    {{ $buku->links() }}
@endsection