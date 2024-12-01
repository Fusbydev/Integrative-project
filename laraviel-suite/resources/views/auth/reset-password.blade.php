<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b120a;
            color: #FEF3E2;
            font-family: 'Karla', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        form {
            background-color: rgba(68, 46, 26, 0.8);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            padding: 20px;
        }

        input, select {
            border-radius: 20px !important;
            background-color: transparent;
            color: #FEF3E2;
        }

        a {
            color: #FFB000 !important;
        }

        button {
            color: #1E140C !important;
            background-color: #FFB000 !important;
            border: none !important;
        }

        .form-control {
            border-radius: 20px;
            background-color: transparent;
            color: #FEF3E2;
        }

        .btn {
            color: #1E140C;
            background-color: #FFB000;
            border: none;
        }

        input::placeholder {
            color: #FEF3E2;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" style="width: 100px;">
            </div>

            <!-- Password Reset Form -->
            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control" required autofocus autocomplete="username" placeholder="Enter your email" value="{{ old('email', $request->email) }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" required autocomplete="new-password" placeholder="Enter new password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="new-password" placeholder="Confirm your password">
                </div>

                <!-- Reset Password Button -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn px-4 py-2">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
