<nav class="bg-gradient-to-r from-[#3B6DD1] to-[#4A8CF7] text-white shadow-lg m-4 rounded-full">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <img src="{{ asset('images/logo-paylater.png') }}" alt="Logo" class="h-10 w-10 rounded-full">
            <span class="text-xl font-bold">PayLater Ku</span>
        </div>
        <div class="hidden md:flex gap-6">
            <a href="{{ route('home') }}" class="hover:text-indigo-200">Beranda</a>
            <a href="{{ route('tagihan.index') }}" class="hover:text-indigo-200">Tagihan Saya</a>
            <a href="{{ route('tagihan.create') }}" class="hover:text-indigo-200">Tambah Tagihan</a>
            <a href="{{ route('riwayat') }}" class="hover:text-indigo-200">Riwayat</a>
            <a href="{{ route('profile.index') }}" class="hover:text-indigo-200">Akun Saya</a>
        </div>
        <div class="flex items-center space-x-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center space-x-2 bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg transition">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>