@extends('layouts.app')
@section('judul', 'Detail Alat')

@section('konten')
  <h2>Detail Alat: {{ $alat->nama }}</h2>
  <p><strong>Kode:</strong> {{ $alat->kode }}</p>
  <p><strong>Nama:</strong> {{ $alat->nama }}</p>
  <p><strong>Stok:</strong> {{ $alat->stok }}</p>
  <p><strong>Kondisi:</strong> {{ $alat->kondisi }}</p>
  <p><strong>Lokasi:</strong> {{ $alat->lokasi ?? '-' }}</p>

  <br>
  <a href="{{ route('alat.index') }}">Kembali ke Daftar Alat</a>
@endsection