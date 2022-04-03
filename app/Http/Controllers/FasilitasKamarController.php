<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Translation\Provider\Dsn;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.fasilitaskamar.index', [
            'fasilitaskamar' => FasilitasKamar::all(),
            'tipekamar' => Kamar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|max:255|unique:fasilitas_kamars',
            'image' => 'required|image|file|max:3000'
        ]);

        $validatedData['image'] = $request->file('image')->store('fasilitas-kamar');

        FasilitasKamar::create($validatedData);

        return redirect('/fasilitas-kamar')->with('success', 'Fasilitas Kamar telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasKamar $fasilitasKamar)
    {
        return view('app.fasilitaskamar.edit', [
            'tipekamar' => Kamar::all(),
            'fasilitaskamar' => $fasilitasKamar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasKamarRequest  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasKamar $fasilitasKamar)
    {
        $rules = [
            'nama' => 'required|max:255',
            'image' => 'image|file|max:3000'
        ];

        if ($request->slug != $fasilitasKamar->slug) {
            $rules['slug'] = 'required|max:255|unique:fasilitas_kamars';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            
            $validatedData['image'] = $request->file('image')->store('fasilitas-kamar');
        }

        FasilitasKamar::where('id', $fasilitasKamar->id)
                      ->update($validatedData);

        return redirect('/fasilitas-kamar')->with('edit', 'Fasilitas Kamar telah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        Storage::delete($fasilitasKamar->image);

        FasilitasKamar::destroy($fasilitasKamar->id);

        return redirect('/fasilitas-kamar')->with('delete', 'Fasilitas Kamar telah berhasil di hapus!');
    }
}
