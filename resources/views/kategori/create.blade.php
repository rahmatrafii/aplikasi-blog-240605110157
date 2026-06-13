@extends('layouts.app')
@section('title', 'Tambah Kategori Artikel')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0" style="color: #2c3e50; letter-spacing: -0.5px;">Tambah Kategori Artikel</h5>
        <a href="{{ route('kategori.index') }}" class="btn btn-sm d-flex align-items-center gap-1 px-3 py-2" style="background-color: #f8f9fa; color: #4a5568; border: 1px solid #e2e8f0; border-radius: 8px; font-weight: 500; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#edf2f7'; this.style.transform='translateY(-1px)'"
            onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(0)'">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card border-0" style="border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); border: 1px solid rgba(0,0,0,0.04);">
        <div class="card-body p-4">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Nama Kategori <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                        id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
                        placeholder="Masukkan nama kategori" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Keterangan
                    </label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                        rows="4" placeholder="Masukkan keterangan kategori (opsional)" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('kategori.index') }}" class="btn btn-sm d-inline-flex align-items-center gap-1"
                        style="background-color: #f8f9fa; color: #4a5568; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-weight: 500; transition: all 0.2s ease;"
                        onmouseover="this.style.backgroundColor='#edf2f7'; this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(0)'">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1"
                        style="border-radius: 8px; padding: 8px 16px; font-weight: 500; transition: all 0.2s ease;"
                        onmouseover="this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
