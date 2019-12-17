<?php

namespace App\Http\Controllers\Aset\Usulan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aset\Usulan\Group_Usulan;
use App\Models\Aset\Usulan\Usulan;

class GroupUsulanController extends Controller
{
    //
    public function index()
    {
        $usulanGroup = Group_Usulan::get();
        foreach ($usulanGroup as $usulan) {
            $usulan->pembuat;
            $usulan->pengelola;
            $usulan->usulan;
        }

        // return $usulanGroup;
        return view('aset.usulan.index', ['usulanGroup' => $usulanGroup]);
    }

    public function createForm()
    {
        return view('aset.usulan.create_form');
    }

    public function create(Request $request)
    {
        //buat group usulan
        $usulanGroup = new Group_Usulan;
        $usulanGroup->nama_usulan = $request->nama_usulan;
        $usulanGroup->id_pembuat = $request->id_pembuat;
        $usulanGroup->status = "Diusulkan";
        $usulanGroup->save();

        //buat usulan
        $namaBarang = $request->nama_barang;
        $jumlahBarang = $request->jml_barang;
        foreach ($namaBarang as $key => $barang) {
            $usulan = new Usulan;
            $usulan->id_group_usulan = $usulanGroup->id;
            $usulan->nama_barang = $barang;
            $usulan->jumlah = $jumlahBarang[$key];
            $usulan->save();
        }
        return redirect('/aset/usulan/detail/'.$usulanGroup->id);
    }

    public function detail($id)
    {
        $usulanGroup = Group_Usulan::get()->where('id', '=', $id)->first();
        $usulanGroup->pembuat;
        $usulanGroup->pengelola;
        $usulanGroup->usulan;

        return $usulanGroup;      
    }
}
