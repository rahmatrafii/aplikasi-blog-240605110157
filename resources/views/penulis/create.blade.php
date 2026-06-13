@extends('layouts.app')
@section('title', 'Tambah Penulis')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0" style="color: #2c3e50; letter-spacing: -0.5px;">Tambah Penulis</h5>
        <a href="{{ route('penulis.index') }}" class="btn btn-sm d-flex align-items-center gap-1 px-3 py-2" style="background-color: #f8f9fa; color: #4a5568; border: 1px solid #e2e8f0; border-radius: 8px; font-weight: 500; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#edf2f7'; this.style.transform='translateY(-1px)'"
            onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(0)'">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card border-0" style="border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); border: 1px solid rgba(0,0,0,0.04);">
        <div class="card-body p-4">
            <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="nama_depan" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                            Nama Depan <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" id="nama_depan"
                            name="nama_depan" value="{{ old('nama_depan') }}" placeholder="Masukkan nama depan" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                        @error('nama_depan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nama_belakang" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                            Nama Belakang <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror"
                            id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}"
                            placeholder="Masukkan nama belakang" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                        @error('nama_belakang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="user_name" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Username <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"
                        name="user_name" value="{{ old('user_name') }}" placeholder="Masukkan username" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                    @error('user_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukkan password (minimal 8 karakter)" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="foto" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Foto Profil
                    </label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto" accept="image/jpg,image/jpeg,image/png" style="border-radius: 8px; font-size: 13.5px; padding: 8px 12px;">
                    <div class="form-text" style="font-size: 12px; color: #718096;">
                        Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB.
                        Jika tidak diunggah, foto default akan digunakan.
                    </div>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('penulis.index') }}" class="btn btn-sm d-inline-flex align-items-center gap-1"
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
