<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Tagihan::where('user_id', $user->id);

        if ($request->has('cari') && $request->cari) {
            $query->where('nama_tagihan', 'like', '%' . $request->cari . '%');
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('tipe_tagihan') && $request->tipe_tagihan) {
            $query->where('tipe_tagihan', $request->tipe_tagihan);
        }

        $tagihan = $query->get();

        $totalBulanIni = $tagihan->sum('jumlah');
        $totalLunas = $tagihan->where('status', 'sudah_dibayar')->sum('jumlah');
        $totalBelum = $tagihan->where('status', 'belum_dibayar')->sum('jumlah');

        return view('tagihan.index', compact('tagihan', 'totalBulanIni', 'totalLunas', 'totalBelum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tagihan' => 'required',
            'tipe_tagihan' => 'required',
            'jumlah' => 'required|integer',
            'jatuh_tempo' => 'required|date'
        ]);

        Tagihan::create([
            'user_id' => Auth::id(),
            'nama_tagihan' => $request->nama_tagihan,
            'tipe_tagihan' => $request->tipe_tagihan,
            'jumlah' => $request->jumlah,
            'jatuh_tempo' => $request->jatuh_tempo,
            'status' => 'belum_dibayar', // ✅ tambahkan default status
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tagihan $tagihan)
    {

        return view('tagihan.edit', compact('tagihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        // $this->authorize('update', $tagihan);

        $request->validate([
            'nama_tagihan' => 'required',
            'tipe_tagihan' => 'required',
            'jumlah' => 'required|integer',
            'jatuh_tempo' => 'required|date',
        ]);

        $tagihan->update($request->all());

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();
        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }

    public function tandaiLunas(Tagihan $tagihan)
    {
        // $this->authorize('update', $tagihan);

        $tagihan->update([
            'status' => 'sudah_dibayar',
            'tanggal_bayar' => now(),   
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan ditandai sudah dibayar.');
    }

    public function riwayat()
    {
        $tagihan = Tagihan::where('status', 'sudah_dibayar')->orderBy('updated_at', 'desc')->get();
        return view('riwayat.index', compact('tagihan'));
    }
}
