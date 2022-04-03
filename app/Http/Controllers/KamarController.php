<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\Pemesanan;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.kamar.index', [
            'kamar' => Kamar::all(),
            'fasilitaskamar' => FasilitasKamar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $faslitas = $request->fasilitas;
        $x = implode(", ",$faslitas);

        $validatedData = request()->validate([
            'type_kamar' => 'required|max:255|unique:kamars',
            'slug' => 'required|max:255|unique:kamars',
            'jmlh_kamar' => 'required|numeric',
            'image' => 'required|image',
            'price' => 'required|numeric'
        ]);

        $validatedData['image'] = $request->file('image')->store('image-kamar');

        $validatedData['fasilitas'] = $x;
        Kamar::create($validatedData);

        return redirect('/kamar')->with('success', 'Kamar telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        $fk = [];
        $kamar = Kamar::find($kamar->id);
        $array = explode(", ", $kamar->fasilitas);
        $fasilitas = FasilitasKamar::all();
        foreach ($array as $k) {
            $fk[] = $k;
        }

        return view('app.kamar.edit', compact('fk', 'kamar', 'fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $faslitas = $request->fasilitas;
        $string = implode(", ", $faslitas);
        $rules = [
            'jmlh_kamar' => 'required|numeric',
            'image' => 'image',
            'price' => 'required|numeric',
        ];

        if ($request->type_kamar != $kamar->type_kamar) {
            $rules['type_kamar'] = 'required|max:255|unique:kamars';
        }

        if ($request->slug != $kamar->slug) {
            $rules['slug'] = 'required|max:255|unique:kamars';
        }

        $validatedData = $request->validate($rules);
        $validatedData['fasilitas'] = $string;

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            
            $validatedData['image'] = $request->file('image')->store('fasilitas-kamar');
        }

        Kamar::where('id', $kamar->id)
                ->update($validatedData);

        return redirect('/kamar')->with('edit', 'Kamar telah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Kamar $kamar)
    {
        Storage::delete($kamar->image);

        Kamar::destroy($kamar->id);

        return redirect('/kamar')->with('delete', 'Kamar telah berhasil di hapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kamar::class, 'slug', $request->type_kamar);
        return response()->json(['slug' => $slug]);
    }
}
