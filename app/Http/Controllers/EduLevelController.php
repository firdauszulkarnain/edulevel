<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EduLevelController extends Controller
{
    public function index()
    {
        $edulevels = DB::table('edulevels')->get();
        // return $edulevels;
        return view('edulevel.data')->with('edulevels', $edulevels);
    }

    public function add()
    {
        return view('edulevel.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama Jenjang Tidak Boleh Kosong!',
            'name.min' => 'Minimal Dua Karakter Inputan!',
            'desc.required' => 'Deskripsi Tidak Boleh Kosong!'
        ]);
        DB::table('edulevels')->insert(
            [
                'name' => $request->nama,
                'desc' => $request->desc
            ]
        );

        return redirect('edulevels')->with('status', 'Data Jenjang Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $edulevel = DB::table('edulevels')->where('id', $id)->first();
        return view('edulevel/edit', compact('edulevel'));
    }
    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:2',
            'desc' => 'required',
        ]);
        DB::table('edulevels')->where('id', $id)
            ->update([
                'name' => $request->nama,
                'desc' => $request->desc
            ]);
        return redirect('edulevels')->with('status', 'Data Jenjang Berhasil Diedit');
    }

    public function delete($id)
    {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels')->with('status', 'Data Jenjang Berhasil Dihapus');
    }
}
