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
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card glass-card">
            <div class="card-header text-highlight"><h4>Login</h4></div>
            <div class="card-body">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="alert mt-3">{{ $error }}</p>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<script>
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