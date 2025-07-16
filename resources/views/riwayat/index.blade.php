@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Riwayat Pembayaran</h1>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Tagihan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Dibayar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tagihan as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $item->nama_tagihan }}</td>
                        <td class="px-6 py-4">{{ $item->tipe_tagihan }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Lunas</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada riwayat pembayaran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection