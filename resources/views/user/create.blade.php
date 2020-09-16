@extends('template.template')

@section('title')
    Tambah Data User
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="{{route('user.index')}}" class="btn btn-success pull-right">Kembali</a>
                </div>

                <div class="box-body">
                    <form class="col-md-6" role="form" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Masukan Nama Lengkap">

                                @if ($errors->has('name'))
                                    <span class="text-red">
                                        {{$errors->first('name')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value"{{old('username')}}" placeholder="Username">

                                @if ($errors->has('username'))
                                    <span class="text-red">
                                        {{$errors->first('username')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value"{{old('email')}}" placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="text-red">
                                        {{$errors->first('email')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                </select>

                                @if ($errors->has('level'))
                                    <span class="text-red">
                                        {{$errors->first('level')}}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Nrp</label>
                                <input type="password" class="form-control" name="password" id="password" value"{{old('password')}}" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="text-red">
                                        {{$errors->first('password')}}
                                    </span>
                                @endif
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
