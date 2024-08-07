@extends('layouts.app')

@section('styles')
<style>
    .input-group-text{
    padding: 0.8rem !important;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="toggle-password" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.
                                </small>
                                <div id="password-strength"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" id="toggle-password-confirm" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password-confirm');
    const passwordStrength = document.getElementById('password-strength');
    const togglePassword = document.getElementById('toggle-password');
    const togglePasswordConfirm = document.getElementById('toggle-password-confirm');

    passwordInput.addEventListener('input', function () {
        const value = passwordInput.value;
        let strength = 0;

        if (value.length >= 8) strength++;
        if (/[A-Z]/.test(value)) strength++;
        if (/[a-z]/.test(value)) strength++;
        if (/[0-9]/.test(value)) strength++;
        if (/[^A-Za-z0-9]/.test(value)) strength++;

        switch (strength) {
            case 1:
            case 2:
                passwordStrength.textContent = 'Weak';
                passwordStrength.style.color = 'red';
                break;
            case 3:
            case 4:
                passwordStrength.textContent = 'Moderate';
                passwordStrength.style.color = 'orange';
                break;
            case 5:
                passwordStrength.textContent = 'Strong';
                passwordStrength.style.color = 'green';
                break;
            default:
                passwordStrength.textContent = '';
        }
    });

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        this.classList.toggle('fa-eye-slash');
    });

    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirmInput.type === 'password' ? 'text' : 'password';
        passwordConfirmInput.type = type;
        this.classList.toggle('fa-eye-slash');
    });
});
</script>
@endsection
