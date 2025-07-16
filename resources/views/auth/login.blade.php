<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>PayLater Ku Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#3B6DD1] to-[#4A8CF7] flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-10">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-normal">Selamat Datang Kembali 👋</h2>
            <h3 class="text-3xl font-extrabold text-[#3B6DD1]">Login PayLater Ku</h3>
            <p class="text-sm text-gray-500 mt-2">Masuk dan kelola tagihanmu dengan mudah dan aman.</p>
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 text-center">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-4 text-gray-500"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email" class="w-full bg-gray-100 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" />
                @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-4 text-gray-500"></i>
                <input id="password" type="password" name="password" required placeholder="Password" class="w-full bg-gray-100 rounded-lg pl-12 pr-10 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" />
                <i class="fas fa-eye absolute right-4 top-4 text-gray-500 cursor-pointer" onclick="togglePassword()"></i>
                @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-700 cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 focus:ring-2 focus:ring-[#3B6DD1]" />
                    Ingat Saya?
                </label>
                @if (Route::has('password.request'))
                <a class="text-[#3B6DD1] hover:underline font-semibold" href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
                @endif
            </div>

            <button type="submit" class="w-full bg-[#5F56E7] text-white font-bold py-3 rounded-lg hover:bg-[#4a3fc1] transition-colors">
                Login
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Belum punya akun?
            <a class="text-[#3B6DD1] hover:underline font-semibold" href="{{ route('register') }}">
                Daftar
            </a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = event.currentTarget;
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>