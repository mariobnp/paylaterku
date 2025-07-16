@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Tagihan</h2>

    <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST" class="bg-white rounded-xl shadow-md p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_tagihan" class="block font-medium">Nama Tagihan</label>
            <input type="text" name="nama_tagihan" id="nama_tagihan" value="{{ old('nama_tagihan', $tagihan->nama_tagihan) }}" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="tipe_tagihan" class="block font-medium">Tipe</label>
            <select name="tipe_tagihan" id="tipe_tagihan" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
                <option value="">Pilih Tipe</option>
                <option value="Listrik" {{ $tagihan->tipe_tagihan == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                <option value="Air" {{ $tagihan->tipe_tagihan == 'Air' ? 'selected' : '' }}>Air</option>
                <option value="Internet" {{ $tagihan->tipe_tagihan == 'Internet' ? 'selected' : '' }}>Internet</option>
                <option value="Kartu Kredit" {{ $tagihan->tipe_tagihan == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                <option value="Lainnya" {{ $tagihan->tipe_tagihan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div>
            <label for="jumlah" class="block font-medium">Jumlah (Rp)</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $tagihan->jumlah) }}" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="jatuh_tempo" class="block font-medium">Tanggal Jatuh Tempo</label>
            <input type="date" name="jatuh_tempo" id="jatuh_tempo" value="{{ old('jatuh_tempo', $tagihan->jatuh_tempo) }}" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('tagihan.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>
@endsection