<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
      $jumlahPemasukan = Pemasukan::where('jenis', 'Pemasukan')->sum('jumlah_uang');
$jumlahPengeluaran = Pemasukan::where('jenis', 'Pengeluaran')->sum('jumlah_uang');

$saldo = $jumlahPemasukan - $jumlahPengeluaran;

        return view('home.awal', compact('pemasukan', 'saldo', 'jumlahPemasukan', 'jumlahPengeluaran'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pemasukan = DB::table('pemasukans')
		->where('keterangan','jenis',"%".$cari."%")
		->paginate();
        
        return view('home.awal',['pemasukans' => $pemasukan]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Pemasukan::Create([
        'jumlah_uang' => $request->jumlah_uang,
        'tanggal' => $request->tanggal,
        'jenis' => $request->jenis,
        'keterangan' => $request->keterangan,
        ]);
        return redirect('/');
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
