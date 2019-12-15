<?php

namespace App\Http\Controllers;
use App\Anggota_Jabatan;
use App\Anggota_Status;
use Auth;
use App\Anggota;
use Illuminate\Http\Request;

class PanitiaKurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Auth::user();
        $anggota->status = Anggota_Status::find($anggota->id_status)->status;
        $anggota->jabatan = Anggota_Jabatan::find($anggota->id_jabatan)->jabatan;
        $posisipanitia = Anggota_Jabatan::where('id_jabatan', '>', 9)->get();
        $seluruhTakmir = Anggota::where('id_panitia', '=', 0)->get();
        $daftar_anggota = Anggota::join('anggota_jabatan', 'id_panitia', '=', 'anggota_jabatan.id_jabatan')->get();
        $adaketuapanitia = false;
        if(Anggota::where('id_panitia','=',10)->count()>0){
            $adaketuapanitia =true;
        }

        $data = [
            'anggota'  => $anggota,
            'list'   => $daftar_anggota,
            'jabatan' => $posisipanitia,
            'seluruhtakmir'=>$seluruhTakmir,
            'isketuapanitia'=>$adaketuapanitia
        ];
        

        return view('kurban/panitia')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Anggota::where('id', $request->anggota)
        ->update([
            'id_panitia' => $request->idJabatan,
            ]);
            return redirect()->route('tambahpanitia')->with('status','Panitia berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        Anggota::where('id', $request->idAnggota)
        ->update([
            'id_panitia' => $request->idJabatan,
            ]);
            return redirect()->route('manajPanitia')->with('status','Panitia berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Anggota::where('id', $request->idAnggota)
        ->update([
            'id_panitia' => 0,
            ]);
            return redirect()->route('manajPanitia')->with('status','Panitia berhasil dihapus');
    }

    
}
