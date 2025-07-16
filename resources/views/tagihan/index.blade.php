@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Card Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500 font-medium">Total Bulan Ini</h3>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-wallet text-indigo-600"></i>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalBulanIni, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">{{ $tagihan->count() }} tagihan</p>
            </div>
        </div>
        <div class="card bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500 font-medium">Sudah Dibayar</h3>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalLunas, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">{{ $tagihan->where('status', 'sudah_dibayar')->count() }} tagihan lunas</p>
            </div>
        </div>
        <div class="card bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500 font-medium">Belum Dibayar</h3>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
            </div>
            <div>
                <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalBelum, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">{{ $tagihan->where('status', 'belum_dibayar')->count() }} tagihan tertunda</p>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <form action="{{ route('tagihan.index') }}" method="GET" class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 md:space-x-4 w-full">
            <div class="relative w-full md:w-1/3">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari tagihan..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <select name="status" class="border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-700 w-full md:w-auto">
                <option value="">Semua Status</option>
                <option value="sudah_dibayar" {{ request('status') == 'sudah_dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                <option value="belum_dibayar" {{ request('status') == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
            </select>
            <select name="tipe_tagihan" class="border border-gray-300 rounded-lg px-4 py-2 bg-white text-gray-700 w-full md:w-auto">
                <option value="">Semua Tipe</option>
                <option value="Listrik" {{ request('tipe_tagihan') == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                <option value="Air" {{ request('tipe_tagihan') == 'Air' ? 'selected' : '' }}>Air</option>
                <option value="Internet" {{ request('tipe_tagihan') == 'Internet' ? 'selected' : '' }}>Internet</option>
                <option value="Kartu Kredit" {{ request('tipe_tagihan') == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                <option value="Lainnya" {{ request('tipe_tagihan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 w-full md:w-auto">Filter</button>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Tagihan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jatuh Tempo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tagihan as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $item->nama_tagihan }}</td>
                        <td class="px-6 py-4">{{ $item->tipe_tagihan }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->jatuh_tempo)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if ($item->status == 'sudah_dibayar')
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Lunas</span>
                            @elseif ($item->status == 'belum_dibayar' && \Carbon\Carbon::parse($item->jatuh_tempo)->isPast())
                            <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">Jatuh Tempo</span>
                            @else
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">Belum Dibayar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('tagihan.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('tagihan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            @if ($item->status == 'belum_dibayar')
                            <form action="{{ route('tagihan.tandaiLunas', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menandai sebagai lunas?')">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-900">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection