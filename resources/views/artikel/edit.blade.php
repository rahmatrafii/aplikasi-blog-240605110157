@extends('layouts.app')
@section('title', 'Edit Artikel')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0" style="color: #2c3e50; letter-spacing: -0.5px;">Edit Artikel</h5>
        <a href="{{ route('artikel.index') }}" class="btn btn-sm d-flex align-items-center gap-1 px-3 py-2" style="background-color: #f8f9fa; color: #4a5568; border: 1px solid #e2e8f0; border-radius: 8px; font-weight: 500; transition: all 0.2s ease;"
            onmouseover="this.style.backgroundColor='#edf2f7'; this.style.transform='translateY(-1px)'"
            onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(0)'">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card border-0" style="border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); border: 1px solid rgba(0,0,0,0.04);">
        <div class="card-body p-4">
            <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Judul <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="Masukkan judul artikel" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="id_kategori" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Kategori <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori"
                        name="id_kategori" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}"
                                {{ old('id_kategori', $artikel->id_kategori) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Isi Artikel <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="6"
                        placeholder="Masukkan isi artikel" style="border-radius: 8px; font-size: 13.5px; padding: 10px 14px;">{{ old('isi', $artikel->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gambar" class="form-label fw-semibold" style="font-size: 13px; color: #4a5568;">
                        Gambar
                    </label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="Gambar Artikel"
                            style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px; border: 2px solid #ffffff; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                    </div>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                        name="gambar" accept="image/jpg,image/jpeg,image/png" style="border-radius: 8px; font-size: 13.5px; padding: 8px 12px;">
                    <div class="form-text" style="font-size: 12px; color: #718096;">
                        Format yang diizinkan: JPG, JPEG, PNG. Ukuran maksimal 2 MB. Kosongkan jika tidak ingin mengubah gambar.
                    </div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('artikel.index') }}" class="btn btn-sm d-inline-flex align-items-center gap-1"
                        style="background-color: #f8f9fa; color: #4a5568; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-weight: 500; transition: all 0.2s ease;"
                        onmouseover="this.style.backgroundColor='#edf2f7'; this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.backgroundColor='#f8f9fa'; this.style.transform='translateY(0)'">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm btn-success d-inline-flex align-items-center gap-1"
                        style="border-radius: 8px; padding: 8px 16px; font-weight: 500; transition: all 0.2s ease;"
                        onmouseover="this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
