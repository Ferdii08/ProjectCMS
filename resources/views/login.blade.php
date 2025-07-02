<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">Login</h4>

        {{-- Flash message jika login gagal --}}
        @if (session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁️</button>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>

</body>
</html>