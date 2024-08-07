<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .error-message {
            color: red;
        }
        .input-group-text {
            cursor: pointer;
        }
        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Register as Admin</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.
                                </small>
                                <div id="password-strength"></div>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="toggle-password-confirm">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password_confirmation');
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
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        togglePasswordConfirm.addEventListener('click', function () {
            const type = passwordConfirmInput.type === 'password' ? 'text' : 'password';
            passwordConfirmInput.type = type;
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
    </script>
</body>

</html>
