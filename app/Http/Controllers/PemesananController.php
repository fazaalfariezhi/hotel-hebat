<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use App\Models\Kamar;
use Carbon\Carbon;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //INV-20223100001
        $now = Carbon::now();
        $tanggal = $now->year . $now->month  . $now->day;
        $cek = Pemesanan::count();
        if ($cek == 0) {
            $urut = 100001;
            $nomer = 'INV-' . $tanggal . $urut;
        } else {
            $ambil = Pemesanan::all()->last()->invoice_id;
            $urut = (int)substr($ambil, 10) +    1;
            // dd($urut);
            $nomer = 'INV-' . $tanggal . $urut;
        }

        $all = Kamar::get();
        $kamar = Kamar::all()->first()->price;

        return view('app.pemesanan.index', [
            'tipekamar' => $all,
            'inv' => $nomer,
            'getprice' => $kamar
        ]);
    }

    public function status(Request $request, $id)
    {
        Pemesanan::find($id)->update([
            'status' => $request->status
        ]);

        if ($request->status === 'Check In') {
            $p = Pemesanan::where('id', $id)->first();

            Kamar::find($p->kamar_id)->update([
                'jmlh_kamar' => $p->kamar->jmlh_kamar + $p->jmlh_kamar
            ]);
        }

        return redirect('/reservation');
    }

    public function getid($id)
    {
        $pemesanan = Kamar::find($id);

        return response()->json($pemesanan);
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
     * @param  \App\Http\Requests\StorePemesananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request()->validate([
            'tgl_cek_in' => 'required|date',
            'tgl_cek_out' => 'required|date',
            'jmlh_kamar' => 'required|numeric|max:5',
            'nama_pemesan' => 'required|max:255',
            'email' => 'required|email',
            'no_telp' => 'required|numeric',
            'nama_tamu' => 'required|max:255',
            'kamar_id' => 'required',
            'price' => 'required',
            'invoice_id' => 'required|unique:pemesanans'
        ]);

        
        // return($request);
        $validatedData['user_id'] = auth()->user()->id;
        
        Pemesanan::create($validatedData);

        return redirect('/beranda')->with('success', 'Anda telah melakukan pemesanan, Cetak struk dan tunjukkan ke Resepsionis untuk melanjutkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananRequest  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
