<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap');

        :root {
            --text-color: #070504;
            --background: #fdfbfa;
            --primary: #cb7c43;
            --secondary: #ecb187;
            --accent: #f38f47;
            --light-shadow: rgba(0, 0, 0, 0.1);
            --dark-shadow: rgba(0, 0, 0, 0.3);
        }

        body {
            background-color: var(--background);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            box-shadow: 0 8px 20px var(--light-shadow);
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 100%;
        }

        input, select, button {
            border-radius: 50px !important;
        }

        input:focus, select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 8px var(--accent);
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        button {
            color: #fff !important;
            background-color: var(--primary) !important;
            border: none !important;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--accent) !important;
        }

        .form-control {
            border: 1px solid #ddd;
            padding: 10px 20px;
        }

        .form-select {
            border: 1px solid #ddd;
            padding: 10px 20px;
        }

        a {
            color: var(--primary) !important;
            transition: color 0.3s ease;
        }

        a:hover {
            color: var(--accent) !important;
        }

        .text-danger {
            font-size: 0.9rem;
            font-style: italic;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-family: 'Libre Baskerville', serif;
            font-weight: 700;
            color: var(--primary);
        }

        .form-header p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<body>
    <form method="POST" action="/register">
        <div class="form-header">
            <h2>Create Account</h2>
            <p>Fill in the form add a new employee.</p>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
            <div class="text-danger mt-1">{{ $errors->first('name') }}</div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
            <div class="text-danger mt-1">{{ $errors->first('email') }}</div>
        </div>

        <!-- Role Dropdown -->
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select id="role" name="role" class="form-select" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="cashier" {{ old('role') == 'cashier' ? 'selected' : '' }}>Cashier</option>
            </select>
            <div class="text-danger mt-1">{{ $errors->first('role') }}</div>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
            <div class="text-danger mt-1">{{ $errors->first('password') }}</div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            <div class="text-danger mt-1">{{ $errors->first('password_confirmation') }}</div>
        </div>

        <!-- Actions -->
        <div class="d-flex justify-content-between align-items-center">
            <a href="/login" class="text-decoration-none small">Already registered?</a>
            <button type="submit" class="btn btn-primary px-4 py-2">Register</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
