<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use App\Http\Requests\UpdateFasilitasHotelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.fasilitashotel.index', [
            'fasilitashotel' => FasilitasHotel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.fasilitashotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFasilitasHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|max:255|unique:fasilitas_kamars',
            'image' => 'required|image|file|max:3000',
            'keterangan' => 'required'
        ]);

        $validatedData['image'] = $request->file('image')->store('fasilitas-hotel');

        FasilitasHotel::create($validatedData);

        return redirect('/fasilitas-hotel')->with('success', 'Fasilitas Hotel telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilitasHotel)
    {
        return view('app.fasilitashotel.edit', [
            'fasilitashotel' => $fasilitasHotel 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFasilitasHotelRequest  $request
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasHotel $fasilitasHotel)
    {
        $rules = [
            'nama' => 'required|max:255',
            'image' => 'image|file|max:3000',
            'keterangan' => 'required'
        ];

        if ($request->slug != $fasilitasHotel->slug) {
            $rules['slug'] = 'required|max:255|unique:fasilitas_hotels';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            Storage::delete($request->oldImage);
            
            $validatedData['image'] = $request->file('image')->store('fasilitas-hotel');
        }

        FasilitasHotel::where('id', $fasilitasHotel->id)
                      ->update($validatedData);

        return redirect('/fasilitas-hotel')->with('edit', 'Fasilitas Hotel telah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitasHotel)
    {
        Storage::delete($fasilitasHotel->image);

        FasilitasHotel::destroy($fasilitasHotel->id);

        return redirect('/fasilitas-hotel')->with('delete', 'Fasilitas Hotel telah berhasil di hapus!');
    }
}
