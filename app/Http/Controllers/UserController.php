<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $user = User::paginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($data, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required|min:6|max:20'
        ], [
            'name.required' => 'Nama lengkap harus di isi !',
            'username.required' => 'Username harus di isi !',
            'email.required' => 'Email harus di isi !',
            'level.required' => 'Level harus di isi !',
            'password.required' => 'Password harus di isi !'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        Alert::success('Berhasil di tambah');
        return redirect()->route('user.index');
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
        $user = User::find($id);

        return view('user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'level' => 'required',
            'password' => 'sometimes|nullable|min:6'
        ], [
            'name.required' => 'Nama lengkap harus di isi !',
            'username.required' => 'Username harus di isi !',
            'email.required' => 'Email harus di isi !',
            'level.required' => 'Level harus di isi !',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.edit', [$id])->withErrors($validasi);
        }

        if ($request->input('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data = Arr::except($data, ['password']);
        }

        $user->update($data);

        Alert::success('Berhasil di ubah');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('status', 'Berhasil di Hapus');
    }
}
