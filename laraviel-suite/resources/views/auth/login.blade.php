<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        :root {
            --text-color:#070504;
            --background:#fdfbfa;
            --primary:#cb7c43;
            --secondary:#ecb187;
            --accent:#f38f47;
        }

        body {
            background-color: var(--background);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
        }
        form {
            background-color: var(--secondary);
            box-shadow: 20px 20px 41px -7px rgba(0,0,0,0.17);
            -webkit-box-shadow: 20px 20px 41px -7px rgba(0,0,0,0.17);
            -moz-box-shadow: 20px 20px 41px -7px rgba(0,0,0,0.17);
            border-radius: 20px;
        }
        input {
            border-radius: 20px!important;
        }
        a {
            color: var(--text-color)!important;
        }
        button {
            color: var(--text-color)!important;
            background-color: var(--accent)!important;
            border: none!important;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Session Status -->
                <div class="alert alert-info mb-4" role="alert" id="session-status" style="display: none;">
                    <!-- Status Message Goes Here -->
                </div>
                <div class="text-center">
                <img src="./images/logo.png" alt="" style="width: 100px;">
                </div>
                <form method="POST" action="{{ route('login') }}" class="p-4 shadow-sm">
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
                        <button type="submit" class="btn btn-primary">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
