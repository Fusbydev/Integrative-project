<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

        :root {
            --text-color: #070504;
            --background: #fdfbfa;
            --primary: #cb7c43;
            --secondary: #ecb187;
            --accent: #f38f47;
        }

        body {
            background-color: var(--background);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
        }

        form {
            background-color: var(--secondary);
            box-shadow: 20px 20px 41px -7px rgba(0, 0, 0, 0.17);
            -webkit-box-shadow: 20px 20px 41px -7px rgba(0, 0, 0, 0.17);
            -moz-box-shadow: 20px 20px 41px -7px rgba(0, 0, 0, 0.17);
            border-radius: 20px;
            padding: 20px;
        }

        input {
            border-radius: 20px !important;
        }

        a {
            color: var(--text-color) !important;
        }

        button {
            color: var(--text-color) !important;
            background-color: var(--accent) !important;
            border: none !important;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="/register">
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
                        <a href="/login" class="text-decoration-none text-muted small">Already registered?</a>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
