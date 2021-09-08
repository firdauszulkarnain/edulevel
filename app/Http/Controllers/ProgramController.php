<?php

namespace App\Http\Controllers;

use App\Program;
use App\Edulevel;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $programs = Program::all();
        $programs = Program::paginate(5);
        // return $program;
        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'edulevel_id' => 'required',
            'student_price' => 'required',
            'student_max' => 'required'
        ], [
            'name.required' => 'Nama Jenjang Tidak Boleh Kosong!',
            'edulevel_id.required' => 'Jenjang Tidak Boleh Kosong!',
            'student_price.required' => 'Harga Tidak Boleh Kosong!',
            'student_max.required' => 'Jumlah Siswa Tidak Boleh Kosong!'
        ]);
        // return $request;

        // Cara 1 : Default Eloquent
        // $program = new Program;

        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;

        // $program->save();

        // Cara 2 : Mass Assignment
        // Program::create([
        //     'name' => $request->name,
        //     'edulevel_id' => $request->edulevel_id,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info
        // ]);

        // Cara 3 -> Syarat : Input field dan nama field tabel database harus sama !
        Program::create($request->all());

        return redirect('programs')->with('status', 'Data Program Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $program->makeHidden(['edulevel_id']);
        return view('program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        return view('program.edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required',
            'edulevel_id' => 'required',
            'student_price' => 'required',
            'student_max' => 'required'
        ], [
            'name.required' => 'Nama Jenjang Tidak Boleh Kosong!',
            'edulevel_id.required' => 'Jenjang Tidak Boleh Kosong!',
            'student_price.required' => 'Harga Tidak Boleh Kosong!',
            'student_max.required' => 'Jumlah Siswa Tidak Boleh Kosong!'
        ]);
        // Cara 1 : Default Eloquent
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;

        // $program->save();

        //  Cara 2 : Mass Assignment
        Program::where('id', $program->id)
            ->update([
                'name' => $request->name,
                'edulevel_id' => $request->edulevel_id,
                'student_price' => $request->student_price,
                'student_max' => $request->student_max,
                'info' => $request->info
            ]);


        return redirect('programs')->with('status', 'Data Program Berhasil Diupdate');

        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        // Cara 1
        // $program->delete();

        // Cara 2
        // Program::destroy($program->id);

        // Cara 3
        Program::where('id', $program->id)->delete();

        return redirect('programs')->with('status', 'Data Program Berhasil Dihapus');
    }

    public function trash()
    {
        $programs = Program::onlyTrashed()->paginate(5);
        return view('program.trash', compact('programs'));
    }

    public function restore($id = null)
    {
        if ($id != null) {
            $programs = Program::onlyTrashed()
                ->where('id', $id)
                ->restore();
        } else {
            $programs = Program::onlyTrashed()
                ->restore();
        }
        return redirect('programs/trash')->with('status', 'Data Program Berhasil Direstore');
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $programs = Program::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        } else {
            $programs = Program::onlyTrashed()
                ->forceDelete();
        }
        return redirect('programs/trash')->with('status', 'Data Program Berhasil Dihapus Permanen');
    }
}
