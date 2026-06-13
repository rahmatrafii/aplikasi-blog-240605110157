@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 160px);">
        <div class="card border-0" style="max-width: 480px; width: 100%; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
            <div class="card-body p-4 p-md-5 text-center">
                <div class="mb-4">
                    <div
                        style="width: 64px; height: 64px; border-radius: 50%; background-color: rgba(46, 125, 50, 0.08); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; transition: transform 0.3s ease; box-shadow: inset 0 2px 4px rgba(46, 125, 50, 0.05);"
                        onmouseover="this.style.transform='scale(1.1)'"
                        onmouseout="this.style.transform='scale(1)'">
                        <i class="fa-solid fa-house-chimney text-success" style="font-size: 24px;"></i>
                    </div>
                    <h5 class="fw-semibold mb-1">
                        Selamat datang,
                        <span style="color: #2e7d32;">{{ $nama_lengkap }}</span>
                    </h5>
                    <p class="text-muted small mb-0">
                        Silakan pilih menu di sebelah kiri untuk mulai mengelola
                        konten blog.
                    </p>
                </div>
                <hr class="my-3" style="border-color: rgba(0,0,0,0.05);">
                <div class="row g-3 text-start">
                    <div class="col-6">
                        <div class="p-3 border-0" style="background-color: #f9fbf9; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);">
                            <div class="text-uppercase fw-semibold mb-1 d-flex align-items-center"
                                style="font-size: 10px; color: #868e96;
letter-spacing: 0.05em;">
                                <i class="fa-solid fa-circle-user text-success me-1" style="font-size: 11px;"></i> Login sebagai
                            </div>
                            <div style="font-size: 12px; font-weight: 600;
color: #212529; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $nama_lengkap }}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border-0" style="background-color: #f9fbf9; border-radius: 12px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);">
                            <div class="text-uppercase fw-semibold mb-1 d-flex align-items-center"
                                style="font-size: 10px; color: #868e96;
letter-spacing: 0.05em;">
                                <i class="fa-solid fa-clock text-success me-1" style="font-size: 11px;"></i> Waktu login
                            </div>
                            <div style="font-size: 12px; font-weight: 600;
color: #212529; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $waktu_login }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
