@extends('layouts.app')

@section('content')
<form action="{{ route('tagihan.store') }}" method="POST" class="bg-white rounded-xl shadow-md p-6 space-y-4 m-4">
    @csrf

    <div>
        <label for="nama_tagihan" class="block font-medium">Nama Tagihan</label>
        <input type="text" name="nama_tagihan" id="nama_tagihan" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
    </div>

    <div>
        <label for="tipe_tagihan" class="block font-medium">Tipe</label>
        <select name="tipe_tagihan" id="tipe_tagihan" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
            <option value="">Pilih Tipe</option>
            <option value="Listrik">Listrik</option>
            <option value="Air">Air</option>
            <option value="Internet">Internet</option>
            <option value="Kartu Kredit">Kartu Kredit</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>

    <div>
        <label for="jumlah" class="block font-medium">Jumlah (Rp)</label>
        <input type="number" name="jumlah" id="jumlah" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
    </div>

    <div>
        <label for="jatuh_tempo" class="block font-medium">Tanggal Jatuh Tempo</label>
        <input type="date" name="jatuh_tempo" id="jatuh_tempo" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500" required>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('tagihan.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 mr-2">Batal</a>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Simpan</button>
    </div>
</form>
@endsection