<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>PayLater Ku Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-b from-[#3B6DD1] to-[#4A8CF7] flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-10">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-semibold">Selamat Datang!</h2>
            <h3 class="text-3xl font-extrabold text-[#3B6DD1]">Daftar Akun Baru</h3>
            <p class="text-sm text-gray-500 mt-2">Kelola tagihanmu dengan mudah dan tepat waktu.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div class="relative">
                <i class="fas fa-user absolute left-4 top-4 text-gray-500"></i>
                <input class="w-full bg-gray-100 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" id="name" type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus />
                @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="relative">
                <i class="fas fa-envelope absolute left-4 top-4 text-gray-500"></i>
                <input class="w-full bg-gray-100 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                @error('email')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-4 text-gray-500"></i>
                <input class="w-full bg-gray-100 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" id="password" type="password" name="password" placeholder="Password" required />
                <i class="fas fa-eye absolute right-4 top-4 text-gray-500 cursor-pointer" onclick="togglePassword()"></i>
                @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-4 top-4 text-gray-500"></i>
                <input class="w-full bg-gray-100 rounded-lg pl-12 pr-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3B6DD1]" id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required />
            </div>

            <button type="submit" class="w-full bg-[#5F56E7] text-white font-bold py-3 rounded-lg hover:bg-[#4a3fc1] transition-colors">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm mt-6">
            Sudah punya akun?
            <a class="text-[#3B6DD1] hover:underline font-semibold" href="{{ route('login') }}">
                Login
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