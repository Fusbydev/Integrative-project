<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .text-white {
            color: #FFFFFF !important;
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
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 text-center">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo" style="width: 100px;">
            </div>
            <!-- Session Status -->
            <div id="session-status" class="alert alert-success mb-4" style="display: none;">
                <!-- Dynamic session status message here -->
            </div>

            <form method="POST" action="{{ route('password.email') }}" id="form">
                @csrf
                <!-- Add CSRF token for Laravel -->
                <div class="mb-4 text-sm text-white text-center">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required autofocus>
                    <div class="text-danger mt-2" id="email-error" style="display: none;">
                        <!-- Dynamic error message here -->
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn px-4 py-2">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('form').addEventListener('submit', function(event) {
            alert('Form submitted, Check Email');
        });
    </script>
</body>
</html>
