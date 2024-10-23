<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = siswa::all();
        return view('guru.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('guru.create');
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

        Siswa::create([
            'pelapor' => $request->pelapor,
            'terlapor' => $request->terlapor,
            'kelas' => $request->kelas,
            'laporan' => $request->laporan,
            'bukti' => $request->bukti,
            'status'=> 'Sedang dalam Tinjuan',
        ]);

        // redirect to index
        return redirect('guru')->with(['Mantap', 'Laporan sudah diterima guru']);
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
        // Fetch a single instance of siswa by ID
        $siswa = siswa::findOrFail($id);
        return view('guru.edit', compact('siswa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $siswas = siswa::findOrFail($id);
        $siswas->status = "Done";
        $siswas->save();
        return redirect('guru')->with('succes','status updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
