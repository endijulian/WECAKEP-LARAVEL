<?php

namespace App\Http\Controllers;

use App\Pelaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PelakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pelaku = Pelaku::paginate(5);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $pelaku = Pelaku::where('nik', 'LIKE', "%$filterKeyword%")->paginate(5);
        }

        $filter_sidikjari = $request->get('sidik_jari');
        if ($filter_sidikjari) {
            $pelaku = Pelaku::where('sidik_jari', 'LIKE', "%$filter_sidikjari%")->paginate(5);
        }

        return view('pelaku.index', compact('pelaku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelaku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelaku = $request->all();
        $validasi = Validator::make($pelaku, [
            'nik' => 'required|max:16|unique:pelaku',
            'nama_lengkap' => 'required',
            'tgl_input' => 'required',
            'poto_depan' => 'nullable|image|mimes:jpg,jpeg,png',
            'poto_kiri' => 'nullable|image|mimes:jpg,jpeg,png',
            'poto_kanan' => 'nullable|image|mimes:jpg,jpeg,png',
            'poto_depan_pidmum' => 'nullable|image|mimes:jpg,jpeg,png',
            'poto_kiri_pidmum' => 'nullable|image|mimes:jpg,jpeg,png',
            'poto_kanan_pidmum' => 'nullable|image|mimes:jpg,jpeg,png'

            // 'poto_depan' => 'required|nullable|image|mimes:jpg,jpeg,png',
            // 'poto_kiri' => 'required|nullable|image|mimes:jpg,jpeg,png',
            // 'poto_kanan' => 'required|nullable|image|mimes:jpg,jpeg,png',
            // 'poto_depan_pidmum' => 'required|nullable|image|mimes:jpg,jpeg,png',
            // 'poto_kiri_pidmum' => 'required|nullable|image|mimes:jpg,jpeg,png',
            // 'poto_kanan_pidmum' => 'required|nullable|image|mimes:jpg,jpeg,png'

        ]);
        if ($validasi->fails()) {
            return redirect()->route('pelaku.create')->withErrors($validasi)->withInput();
        }

        $gambar_pelaku1 = $request->file('poto_depan');
        if ($request->file('poto_depan')) {
            $extention = $gambar_pelaku1->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/depan/pelaku';
            $request->file('poto_depan')->move($upload_path, $namaFoto);

            $pelaku['poto_depan'] = $namaFoto;
        }


        $gambar_pelaku2 = $request->file('poto_kiri');
        if ($request->file('poto_kiri')) {
            $extention = $gambar_pelaku2->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/kiri/pelaku';
            $request->file('poto_kiri')->move($upload_path, $namaFoto);

            $pelaku['poto_kiri'] = $namaFoto;
        }

        $gambar_pelaku3 = $request->file('poto_kanan');
        if ($request->file('poto_kanan')) {
            $extention = $gambar_pelaku3->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/kanan/pelaku';
            $request->file('poto_kanan')->move($upload_path, $namaFoto);

            $pelaku['poto_kanan'] = $namaFoto;
        }

        // POTO PIDANA UMUM
        $gambar_pelaku4 = $request->file('poto_depan_pidmum');
        if ($request->file('poto_depan_pidmum')) {
            $extention = $gambar_pelaku4->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/depanPidmum/pelaku';
            $request->file('poto_depan_pidmum')->move($upload_path, $namaFoto);

            $pelaku['poto_depan_pidmum'] = $namaFoto;
        }

        $gambar_pelaku5 = $request->file('poto_kiri_pidmum');
        if ($request->file('poto_kiri_pidmum')) {
            $extention = $gambar_pelaku5->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/kiriPidmum/pelaku';
            $request->file('poto_kiri_pidmum')->move($upload_path, $namaFoto);

            $pelaku['poto_kiri_pidmum'] = $namaFoto;
        }

        $gambar_pelaku6 = $request->file('poto_kanan_pidmum');
        if ($request->file('poto_kanan_pidmum')) {
            $extention = $gambar_pelaku6->getClientOriginalExtension();
            $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
            $upload_path = 'public/uploads/kananPidmum/pelaku';
            $request->file('poto_kanan_pidmum')->move($upload_path, $namaFoto);

            $pelaku['poto_kanan_pidmum'] = $namaFoto;
        }

        Pelaku::create($pelaku);
        Alert::success('Berhasil di tambah');
        return redirect()->route('pelaku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaku = Pelaku::findOrFail($id);
        return view('pelaku.show', compact('pelaku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaku = Pelaku::findOrFail($id);
        return view('pelaku.edit', compact('pelaku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelaku = Pelaku::findOrFail($id);
        $input =  $request->all();

        $validasi = Validator::make($input, [
            'nik' => 'required|max:16|unique:pelaku,nik,' . $id,
            'nama_lengkap' => 'required',
            'tgl_input' => 'required',
            'poto_depan' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'poto_kiri' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'poto_kanan' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'poto_depan_pidmum' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'poto_kiri_pidmum' => 'sometimes|nullable|image|mimes:jpg,jpeg,png',
            'poto_kanan_pidmum' => 'sometimes|nullable|image|mimes:jpg,jpeg,png'
        ]);


        if ($validasi->fails()) {
            return redirect()->route('pelaku.edit', $id)->withErrors($validasi)->withInput();
        }
        if ($request->hasFile('poto_depan')) {
            if ($request->file('poto_depan')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_depan);

                $gambar_pelaku = $request->file('poto_depan');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/depan/pelaku';
                $request->file('poto_depan')->move($upload_path, $namaFoto);

                $input['poto_depan'] = $namaFoto;
            }
        }

        if ($request->hasFile('poto_kiri')) {
            if ($request->file('poto_kiri')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_kiri);

                $gambar_pelaku = $request->file('poto_kiri');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/kiri/pelaku';
                $request->file('poto_kiri')->move($upload_path, $namaFoto);

                $input['poto_kiri'] = $namaFoto;
            }
        }

        if ($request->hasFile('poto_kanan')) {
            if ($request->file('poto_kanan')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_kanan);

                $gambar_pelaku = $request->file('poto_kanan');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/kanan/pelaku';
                $request->file('poto_kanan')->move($upload_path, $namaFoto);

                $input['poto_kanan'] = $namaFoto;
            }
        }

        if ($request->hasFile('poto_depan_pidmum')) {
            if ($request->file('poto_depan_pidmum')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_depan_pidmum);

                $gambar_pelaku = $request->file('poto_depan_pidmum');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/depanPidmum/pelaku';
                $request->file('poto_depan_pidmum')->move($upload_path, $namaFoto);

                $input['poto_depan_pidmum'] = $namaFoto;
            }
        }

        if ($request->hasFile('poto_kiri_pidmum')) {
            if ($request->file('poto_kiri_pidmum')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_kiri_pidmum);

                $gambar_pelaku = $request->file('poto_kiri_pidmum');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/kiriPidmum/pelaku';
                $request->file('poto_kiri_pidmum')->move($upload_path, $namaFoto);

                $input['poto_kiri_pidmum'] = $namaFoto;
            }
        }

        if ($request->hasFile('poto_kanan_pidmum')) {
            if ($request->file('poto_kanan_pidmum')->isValid()) {
                Storage::disk('public')->delete($pelaku->poto_kanan_pidmum);

                $gambar_pelaku = $request->file('poto_kanan_pidmum');
                $extention = $gambar_pelaku->getClientOriginalExtension();

                $namaFoto = "pelaku/" . date('YmdHis') . "." . $extention;
                $upload_path = 'public/uploads/kananPidmum/pelaku';
                $request->file('poto_kanan_pidmum')->move($upload_path, $namaFoto);

                $input['poto_kanan_pidmum'] = $namaFoto;
            }
        }

        $pelaku->update($input);
        Alert::success('Berhasil di Update');
        return redirect()->route('pelaku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaku = Pelaku::findOrFail($id);
        $pelaku->delete();

        return redirect()->route('pelaku.index')->with('status', 'Berhasil di Hapus');
    }
}
