<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #442E1A;
            color: #FEF3E2;
            font-family: 'Karla', sans-serif;
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

        .text-white {
            color: #FFFFFF !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" style="width: 100px;">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @if ($errors->has('email'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                        @if ($errors->has('password'))
                            <div class="text-danger mt-1">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>