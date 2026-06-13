<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Aplikasi Blog</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --login-primary: #2e7d32;
            --login-primary-hover: #1b5e20;
            --login-bg: #f4f4f9;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e8f5e9 0%, #f4f4f9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(46, 125, 50, 0.08), 0 5px 15px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            background: #ffffff;
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #f8f9fa;
            padding: 32px 32px 16px;
            text-align: center;
        }

        .card-body {
            padding: 24px 32px 32px;
        }

        .login-logo {
            width: 56px;
            height: 56px;
            background-color: rgba(46, 125, 50, 0.08);
            color: var(--login-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .login-logo:hover {
            transform: scale(1.1);
        }

        .form-control, .input-group-text, .btn {
            border-radius: 10px;
        }

        .input-group-text {
            background-color: transparent;
            color: #868e96;
            border-right: none;
            padding-left: 16px;
            transition: border-color 0.15s ease-in-out;
        }

        .form-control {
            padding: 10px 14px;
            font-size: 14px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            box-shadow: none !important;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .form-control,
        .input-group:focus-within #togglePassword {
            border-color: var(--login-primary) !important;
        }

        #togglePassword {
            border-color: #dee2e6;
            transition: border-color 0.15s ease-in-out, color 0.2s ease;
        }

        #togglePassword:hover {
            color: var(--login-primary) !important;
        }
        
        .btn-primary {
            background-color: var(--login-primary);
            border-color: var(--login-primary);
            padding: 11px 20px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--login-primary-hover);
            border-color: var(--login-primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(46, 125, 50, 0.2);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #868e96;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: var(--login-primary);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <!-- Back Link -->
                <div class="mb-3 text-start">
                    <a href="{{ route('pengunjung.index') }}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="login-logo">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h5 class="mb-1 fw-bold" style="color: #212529;">Aplikasi Blog</h5>
                        <p class="text-muted small mb-0">Masukkan kredensial untuk melanjutkan</p>
                    </div>
                    <div class="card-body">

                        @if ($errors->has('gagal'))
                            <div class="alert alert-danger alert-dismissible fade show py-2 px-3 small d-flex align-items-center gap-2 mb-4" role="alert" style="border-radius: 8px;">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <span>{{ $errors->first('gagal') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" style="padding: 0.8rem 1rem;"></button>
                            </div>
                        @endif

                        <form action="{{ route('login.proses') }}" method="POST">
                            @csrf
                            
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="user_name" class="form-label small fw-semibold text-secondary">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" class="form-control border-start-0" id="user_name" name="user_name"
                                        value="{{ old('user_name') }}" placeholder="Masukkan username" autofocus required>
                                </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label small fw-semibold text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text border-end-0"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" class="form-control border-start-0 border-end-0" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                    <button class="btn btn-outline-secondary border-start-0 bg-transparent text-muted px-3" type="button" id="togglePassword" style="border-left: none;">
                                        <i class="fa-regular fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Show/Hide Password Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
            const eyeIcon = document.querySelector('#eyeIcon');

            if (togglePassword && password && eyeIcon) {
                togglePassword.addEventListener('click', function() {
                    // Toggle input type
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    
                    // Toggle eye icon class
                    if (type === 'text') {
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                });
            }
        });
    </script>
</body>

</html>
