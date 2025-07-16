@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold mb-6">Edit Profil</h2>

    <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-6 text-center">
                <div class="w-32 h-32 mx-auto mb-4">
                    @if ($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="w-full h-full object-cover rounded-full border-4 border-indigo-500 shadow">
                    @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=4F46E5&color=fff&size=128" alt="Avatar" class="w-full h-full object-cover rounded-full border-4 border-indigo-500 shadow">
                    @endif
                </div>
                <input type="file" name="profile_photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700" />
            </div>

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('profile.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Batal</a>
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection