<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data siswa dari database
        $siswas = siswa::all();

        // Kirim data siswa ke view index.blade.php
        return view('siswa.index', compact('siswas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelapor' => 'required|string',
            'terlapor' => 'required|string',
            'kelas' => 'required|string',
            'laporan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $image = $request->file('bukti');
        $image->storeAs('bukti', $image->hashName(),'public');

        Siswa::create([
            'pelapor' => $request->pelapor,
            'terlapor' => $request->terlapor,
            'kelas' => $request->kelas,
            'laporan' => $request->laporan,
            'bukti' => $image->hashName(),
            'status'=> 'Sedang dalam Tinjauan',
        ]);

        // redirect to index
        return redirect('siswa')->with(['Mantap', 'Laporan sudah diterima guru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
