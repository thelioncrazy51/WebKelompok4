@extends('main.layout')

@section('body-attr', 'style=background:linear-gradient(135deg, #0b3d0b, #a7d7a7);')

@section('container')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.89);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .text-highlight {
        color: #145214;
        font-weight: 700;
    }
    .card-header {
        text-align: center;
    }
    label {
        color: #145214;
    }
    .input-password {
        display: flex;
        align-items: center;
    }
    .password {
        flex: 1;
        padding-right: 40px;
    }
    .toggle-password {
        margin-left: -35px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        z-index: 2;
    }
    .eye-icon {
        font-style: normal;
    }
    .alert {
        padding: 0;
        margin: 0;
        color: red;
    }
    .modal-content {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
    }
    .modal-header {
        border-bottom: 1px solid #145214;
    }
    .modal-title {
        color: #145214;
        font-weight: 700;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card glass-card">
            <div class="card-header text-highlight"><h4>Register</h4></div>
            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                            <p class="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-password">
                            <input type="password" class="password form-control" id="password" name="password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password')">
                                <i class="eye-icon">👁️</i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-password">
                            <input type="password" class="password form-control" id="password_confirmation" name="password_confirmation" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation')">
                                <i class="eye-icon">👁️</i>
                            </button>
                        </div>
                        @error('password')
                            <p class="alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk notifikasi -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalMessage"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="/login" class="btn btn-success" id="goToLogin">Login</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('modal'))
            const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
            document.getElementById('modalTitle').textContent = '{{ session('modal.title') }}';
            document.getElementById('modalMessage').textContent = '{{ session('modal.message') }}';
            document.getElementById('goToLogin').style.display = 'block';
            modal.show();
        @endif
        
        @if($errors->any())
            const modal = new bootstrap.Modal(document.getElementById('notificationModal'));
            document.getElementById('modalTitle').textContent = 'Registrasi Gagal';
            document.getElementById('modalMessage').innerHTML = `
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            `;
            document.getElementById('goToLogin').style.display = 'none';
            modal.show();
        @endif
    });

    function togglePassword(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const eyeIcon = passwordField.nextElementSibling.querySelector('.eye-icon');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.textContent = "🙈";
        } else {
            passwordField.type = "password";
            eyeIcon.textContent = "👁️";
        }
    }
</script>
@endsection
