<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pemesanan;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = pemesanan::latest()->get();
        return view('pemesanan.index', compact('pemesanan'));
    }
    public function create()
    {
        return view('pemesanan.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'nomor' => 'required',
            'email' => 'required',
            'harga' => 'required',
            'menu' => 'required',
            'size' => 'required',
            'keterangan' => 'required'
        ]);

        $pemesanan = pemesanan::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
            'harga' => $request->harga,
            'menu' => $request->menu,
            'size' => $request->size,
            'keterangan' => $request->keterangan
        ]);

        if ($pemesanan) {
            return redirect()
                ->route('pemesanan.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function edit($id)
    {
        $pemesanan = pemesanan::findOrFail($id);
        return view('pemesanan.edit', compact('pemesanan'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'nomor' => 'required',
            'email' => 'required',
            'harga' => 'required',
            'menu' => 'required',
            'size' => 'required',
            'keterangan' => 'required'
        ]);

        $pemesanan = pemesanan::findOrFail($id);

        $pemesanan->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'email' => $request->email,
            'harga' => $request->harga,
            'menu' => $request->menu,
            'size' => $request->size,
            'keterangan' => $request->keterangan
        ]);

        if ($pemesanan) {
            return redirect()
                ->route('pemesanan.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $pemesanan = pemesanan::findOrFail($id);
        $pemesanan->delete();

        if ($pemesanan) {
            return redirect()
                ->route('pemesanan.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pemesanan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}