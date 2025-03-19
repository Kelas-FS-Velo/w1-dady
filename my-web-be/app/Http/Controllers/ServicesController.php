<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class ServicesController extends Controller
{
    /**
     * Tampilkan daftar layanan.
     */
    public function index(): View
    {
        $services = Services::latest()->paginate(10);
        return view('services.index', compact('services'));
    }

    public function getServices()
    {
        $services = Services::all()->map(function ($service) {
            $service->img = $service->img ? asset('storage/services/' . $service->img) : null;
            return $service;
        });

        return response()->json($services);
    }



    /**
     * Tampilkan form untuk membuat layanan baru.
     */
    public function create(): View
    {
        return view('services.create');
    }

    /**
     * Tampilkan detail layanan tertentu.
     */
    public function show(Services $service): View
    {
        return view('services.show', compact('service'));
    }

    /**
     * Tampilkan form edit layanan.
     */
    public function edit(Services $service): View
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update layanan dalam database.
     */
    public function update(Request $request, Services $service): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'framework' => 'nullable|string|max:255',
            'img' => 'nullable|string',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Hapus layanan dari database.
     */
    public function destroy(Services $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

        /**
     * Simpan layanan baru ke database.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'title'     => 'required|string|max:255',
        'desc'      => 'required|string',
        'framework' => 'required|string|max:255',
        'img'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    if ($request->hasFile('img')) {
        $img = $request->file('img');
        $path = $img->store('services', 'public');

        Services::create([
            'img'       => $path,
            'title'     => $request->title,
            'desc'      => $request->desc,
            'framework' => $request->framework,
        ]);

        return redirect()->route('services.index')->with('success', 'Data berhasil ditambahkan.');
    }

    return redirect()->back()->withErrors(['img' => 'File gambar tidak ditemukan.']);
}


}
