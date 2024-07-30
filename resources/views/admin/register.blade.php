<!-- resources/views/admin/register.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration</title>
    <!-- Add any necessary stylesheets here -->
</head>
<body>
    <h1>Register as Admin</h1>
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>