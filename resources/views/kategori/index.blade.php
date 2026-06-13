@extends('layouts.app')
@section('title', 'Kelola Kategori Artikel')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0" style="color: #2c3e50; letter-spacing: -0.5px;">Data Kategori Artikel</h5>
        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-success d-flex align-items-center gap-1 px-3 py-2" style="border-radius: 8px; font-weight: 500; transition: all 0.2s ease;">
            <i class="fa-solid fa-plus"></i> Tambah Kategori
        </a>
    </div>
    <div class="card border-0" style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); border: 1px solid rgba(0,0,0,0.04);">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr style="background-color: #f8f9fa; border-bottom: 2px solid #f0f0f0;">
                            <th class="px-4 py-3"
                                style="font-size: 11px; color: #718096;
text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600; width: 80px;">
                                No
                            </th>
                            <th class="px-4 py-3"
                                style="font-size: 11px; color: #718096;
text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">
                                Nama Kategori
                            </th>
                            <th class="px-4 py-3"
                                style="font-size: 11px; color: #718096;
text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600;">
                                Keterangan
                            </th>
                            <th class="px-4 py-3"
                                style="font-size: 11px; color: #718096;
text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600; width: 200px;">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori as $index => $item)
                            <tr style="border-bottom: 1px solid #f0f0f0; transition: background-color 0.2s ease;">
                                <td class="px-4 py-3" style="font-size: 13px; color: #4a5568;">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-4 py-3 fw-medium" style="font-size: 13px; color: #2d3748;">
                                    {{ $item->nama_kategori }}
                                </td>
                                <td class="px-4 py-3" style="font-size: 13px; color: #718096;">
                                    {{ $item->keterangan ?? '-' }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm d-inline-flex align-items-center gap-1"
                                            style="background-color: #e3f2fd; color: #1565c0; font-size: 12px; border-radius: 6px; padding: 6px 12px; font-weight: 500; transition: all 0.2s ease;"
                                            onmouseover="this.style.backgroundColor='#d0e8ff'; this.style.transform='translateY(-1px)'"
                                            onmouseout="this.style.backgroundColor='#e3f2fd'; this.style.transform='translateY(0)'">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm d-inline-flex align-items-center gap-1"
                                                style="background-color: #ffebee; color: #c62828; font-size: 12px; border-radius: 6px; padding: 6px 12px; font-weight: 500; transition: all 0.2s ease;"
                                                onmouseover="this.style.backgroundColor='#ffd5d5'; this.style.transform='translateY(-1px)'"
                                                onmouseout="this.style.backgroundColor='#ffebee'; this.style.transform='translateY(0)'">
                                                <i class="fa-solid fa-trash-can"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-4 text-center"
                                    style="font-size: 13px; color: #a0aec0; font-style: italic;">
                                    <i class="fa-solid fa-folder-open me-1" style="font-size: 14px;"></i> Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
