@extends('layouts.app')

@section('content')
@php
$bgHero = asset('images/hero.jpg');
$bgCta = asset('images/cta.jpg');
@endphp

{{-- Hero Section --}}
<div class="relative bg-cover bg-center text-white py-32" style="background-image: url('{{ $bgHero }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di <span class="text-indigo-600">PayLater Ku</span> </h1>
        <p class="text-lg md:text-xl mb-6">Kelola semua tagihanmu dengan mudah, cepat, dan aman di satu tempat.</p>
        <a href="{{ route('tagihan.index') }}" class="bg-opacity-90 text-white-600 font-semibold px-6 py-3 rounded-full border border-white-400 hover:text-indigo-600 transition">Lihat Tagihan Saya</a>
    </div>
</div>

{{-- Kenapa Memilih Section --}}
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Kenapa Pilih PayLater Ku?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div class="p-6 border rounded-xl shadow hover:shadow-lg transition">
                <i class="fas fa-shield-alt text-indigo-600 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Aman & Terpercaya</h3>
                <p class="text-gray-600">Data dan transaksi kamu dijamin aman dengan teknologi enkripsi terbaru.</p>
            </div>
            <div class="p-6 border rounded-xl shadow hover:shadow-lg transition">
                <i class="fas fa-clock text-indigo-600 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Cepat & Mudah</h3>
                <p class="text-gray-600">Bayar tagihan hanya dalam beberapa klik tanpa ribet.</p>
            </div>
            <div class="p-6 border rounded-xl shadow hover:shadow-lg transition">
                <i class="fas fa-wallet text-indigo-600 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Kelola Keuangan</h3>
                <p class="text-gray-600">Pantau pengeluaran bulananmu dan atur prioritas pembayaran dengan lebih baik.</p>
            </div>
        </div>
    </div>
</div>

{{-- Testimoni --}}
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8">Apa Kata Mereka?</h2>
        <div class="flex flex-col md:flex-row justify-center gap-8">
            <div class="bg-white p-6 rounded-xl shadow w-full md:w-1/3">
                <p class="text-gray-600 mb-4">"Sekarang bayar tagihan listrik dan internet jadi lebih gampang! Tidak pernah telat lagi."</p>
                <div class="font-semibold">Dina, Freelancer</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow w-full md:w-1/3">
                <p class="text-gray-600 mb-4">"User interface simpel, fitur lengkap. PayLater Ku membantu saya mengelola keuangan bulanan."</p>
                <div class="font-semibold">Rizky, Karyawan</div>
            </div>
        </div>
    </div>
</div>

{{-- CTA --}}
<div class="relative bg-cover bg-center text-white py-32" style="background-image: url('{{ $bgCta }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-7">Siap Lebih Mudah Mengatur Tagihanmu?</h2>
        <a href="{{ route('tagihan.create') }}" class="text-white font-semibold px-6 py-3 rounded-full border border-white-400 hover:text-indigo-600 transition">Tambah Tagihan Sekarang</a>
    </div>
</div>
@endsection