@extends('template.template')

@section('title')
    Tambah data pelaku
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="{{route('pelaku.index')}}" class="btn btn-success pull-right">Kembali</a>
                </div>

                <div class="box-body">
                    <form class="form-horizontal" role="form" action="{{route('pelaku.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                    {{--  DATA IDENTITAS TERSANGKA  --}}
                    <div class="box-body col-md-8 progress-bar-primary center-block">
                        <center style="color: black">
                            <h3>Data Identitas Tersangka</h3>
                        </center><br>

                        <div class="form-group">
                            <label for="tgl_input" class="col-sm-2 control-label">Tanggal Input</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tgl_input')}}" type="text" name="tgl_input" id="tgl_input" class="form-control">
                                </div>


                                @if ($errors->has('tgl_input'))
                                    <span class="text-white">
                                        {{$errors->first('tgl_input')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nik') ? 'invalid' : ''}}">
                            <label for="nik" class="col-sm-2 control-label">NIK</label>

                            <div class="col-sm-10">
                            <input value="{{ old('nik') }}" type="number" class="form-control" id="nik" name="nik" placeholder="Input NIK">

                                @if ($errors->has('nik'))
                                    <span class="text-white">
                                        {{$errors->first('nik')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sidik_jari" class="col-sm-2 control-label">Sidik Jari</label>

                            <div class="col-sm-10">
                            <input value="{{ old('sidik_jari') }}" type="text" class="form-control" id="sidik_jari" name="sidik_jari" placeholder="Input Sidik Jari">
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nama_lengkap') ? 'invalid' : ''}}">
                            <label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>

                            <div class="col-sm-10">
                            <input value="{{ old('nama_lengkap') }}" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap">

                                @if ($errors->has('nama_lengkap'))
                                    <span class="text-white">
                                        {{$errors->first('nama_lengkap')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="nama_alias" class="col-sm-2 control-label">Nama Alias</label>

                            <div class="col-sm-10">
                            <input value="{{ old('nama_alias') }}" type="text" class="form-control" id="nama_alias" name="nama_alias" placeholder="Nama alias">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>

                            <div class="col-sm-10">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="agama" class="col-sm-2 control-label">Agama</label>

                            <div class="col-sm-10">
                                <select name="agama" id="agama" class="form-control">
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>

                            <div class="col-sm-10">
                            <input value="{{ old('tempat_lahir') }}" type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tanggal_lahir')}}" type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                                </div>


                                @if ($errors->has('tanggal_lahir'))
                                    <span class="text-white">
                                        {{$errors->first('tanggal_lahir')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_jalan" class="col-sm-2 control-label">Nama Jalan</label>
                            <div class="col-sm-3">
                                <textarea name="nama_jalan" id="nama_jalan" class="form-control">{{ old('nama_jalan') }}</textarea>
                            </div>

                            <label for="rt" class="col-sm-1 control-label">Rt</label>
                            <div class="col-sm-2">
                                <input value="{{ old('rt') }}" type="text" class="form-control" id="rt" name="rt" placeholder="Rt">
                            </div>

                            <label for="rw" class="col-sm-1 control-label">Rw</label>
                            <div class="col-sm-2">
                                <input value="{{ old('rw') }}" type="text" class="form-control" id="rw" name="rw" placeholder="Rw">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan" class="col-sm-2 control-label">Desa/Kelurahan</label>

                            <div class="col-sm-10">
                            <input value="{{ old('desa_kel') }}" type="text" class="form-control" id="desa_kel" name="desa_kel" placeholder="Desa/Kelurahan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>

                            <div class="col-sm-10">
                            <input value="{{ old('kecamatan') }}" type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kab_kot" class="col-sm-2 control-label">Kabupaten/Kota</label>

                            <div class="col-sm-10">
                            <input value="{{ old('kab_kot') }}" type="text" class="form-control" id="kab_kot" name="kab_kot" placeholder="Kabupaten/Kota">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>

                            <div class="col-sm-10">
                            <input value="{{ old('provinsi') }}" type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi">
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_depan') ? 'invalid' : ''}}">
                            <label for="poto_depan" class="col-sm-2 control-label">Poto Depan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_depan') }}" type="file" class="form-control" id="poto_depan" name="poto_depan" placeholder="Poto depan">

                                @if ($errors->has('poto_depan'))
                                    <span class="text-white">
                                        {{$errors->first('poto_depan')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_kiri') ? 'invalid' : ''}}">
                            <label for="poto_kiri" class="col-sm-2 control-label">Poto Kiri</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_kiri') }}" type="file" class="form-control" id="poto_kiri" name="poto_kiri" >

                                @if ($errors->has('poto_kiri'))
                                    <span class="text-white">
                                        {{$errors->first('poto_kiri')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_kanan') ? 'invalid' : ''}}">
                            <label for="poto_kanan" class="col-sm-2 control-label">Poto Kanan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_kanan') }}" type="file" class="form-control" id="poto_kanan" name="poto_kanan">
                                @if ($errors->has('poto_kanan'))
                                    <span class="text-white">
                                        {{$errors->first('poto_kanan')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catatan" class="col-sm-2 control-label">Catatan</label>
                            <div class="col-sm-10">
                                <textarea name="catatan" id="catatan" class="form-control">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                    </div>

                    {{--  //DATA TINDAK PIDANA UMUM  --}}
                    <div class="box-body col-md-8 progress-bar-primary" style="margin-top: 20px;">
                        <center style="color: black;">
                            <h3>DATA TINDAK PIDANA UMUM</h3>
                            <h4>Diisi berdasarkan Tindak Pidana sebagaimana tercantum dalam KUHP</h4>
                        </center><br>

                        <div class="form-group">
                            <label for="no_lap_polisi" class="col-sm-2 control-label">Nomor LAP. Polisi</label>
                            <div class="col-sm-10">
                                <input value="{{ old('no_lap_polisi') }}" type="text" class="form-control" id="no_lap_polisi" name="no_lap_polisi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_lap_polisi" class="col-sm-2 control-label">Tanggal LAP. Polisi</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tgl_lap_polisi')}}" type="text" name="tgl_lap_polisi" id="tgl_lap_polisi" class="form-control">
                                </div>


                                @if ($errors->has('tgl_lap_polisi'))
                                    <span class="text-white">
                                        {{$errors->first('tgl_lap_polisi')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lok_kejadian" class="col-sm-2 control-label">Nama Jalan</label>
                            <div class="col-sm-10">
                                <textarea name="lok_kejadian" id="lok_kejadian" class="form-control">{{ old('lok_kejadian') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kejadian" class="col-sm-2 control-label">Tanggal Kejadian</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tgl_kejadian')}}" type="text" name="tgl_kejadian" id="tgl_kejadian" class="form-control">
                                </div>


                                @if ($errors->has('tgl_kejadian'))
                                    <span class="text-white">
                                        {{$errors->first('tgl_kejadian')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pasal_pidana" class="col-sm-2 control-label">Pasal Pidana</label>
                            <div class="col-sm-10">
                                <input value="{{ old('pasal_pidana') }}" type="text" class="form-control" id="pasal_pidana" name="pasal_pidana">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jenis_hukuman" class="col-sm-2 control-label">Jenis Hukuman</label>
                            <div class="col-sm-3">
                                <input value="{{ old('jenis_hukuman') }}" type="text" class="form-control" id="jenis_hukuman" name="jenis_hukuman" placeholder="Jenis Hukuman">
                            </div>

                            <label for="lama_hukuman" class="col-sm-1 control-label">Lama</label>
                            <div class="col-sm-2">
                                <input value="{{ old('lama_hukuman') }}" type="text" class="form-control" id="lama_hukuman" name="lama_hukuman" placeholder="Lama ">
                            </div>

                            <label for="waktu_hukuman" class="col-sm-1 control-label">Waktu</label>
                            <div class="col-sm-2">
                                <input value="{{ old('waktu_hukuman') }}" type="text" class="form-control" id="waktu_hukuman" name="waktu_hukuman" placeholder="Waktu ">
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_depan_pidmum') ? 'invalid' : ''}}">
                            <label for="poto_depan_pidmum" class="col-sm-2 control-label">Poto Depan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_depan_pidmum') }}" type="file" class="form-control" id="poto_depan_pidmum" name="poto_depan_pidmum" placeholder="Poto depan">

                                @if ($errors->has('poto_depan_pidmum'))
                                    <span class="text-white">
                                        {{$errors->first('poto_depan_pidmum')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_kiri_pidmum') ? 'invalid' : ''}}">
                            <label for="poto_kiri_pidmum" class="col-sm-2 control-label">Poto Kiri</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_kiri_pidmum') }}" type="file" class="form-control" id="poto_kiri_pidmum" name="poto_kiri_pidmum" >

                                @if ($errors->has('poto_kiri_pidmum'))
                                    <span class="text-white">
                                        {{$errors->first('poto_kiri_pidmum')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('poto_kanan_pidmum') ? 'invalid' : ''}}">
                            <label for="poto_kanan_pidmum" class="col-sm-2 control-label">Poto Kanan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('poto_kanan_pidmum') }}" type="file" class="form-control" id="poto_kanan_pidmum" name="poto_kanan_pidmum">

                            @if ($errors->has('poto_kanan_pidmum'))
                                <span class="text-white">
                                    {{$errors->first('poto_kanan_pidmum')}}
                                </span>
                            @endif
                            </div>
                        </div>

                    </div>

                    {{--  DATA PELANGGARAN  --}}
                    <div class="box-body pull-left col-md-8 progress-bar-primary" style="margin-top: 20px;">
                        <center style="color: black;">
                            <h3>DATA PELANGGARAN</h3>
                            <h4>Diisi berdasarkan Pelanggaran sebagaimana tercantum dalam :</h4>
                            <li>UU No 2 Tahun 2009 tentang Lalu Lintas dan Angkutan Jalan</li>
                            <li style="margin-right: 117px;">KUHP Buku Ketiga tentang Pelanggaran</li>
                        </center><br>
                        <div class="form-group">
                            <label for="no_reg_lapor" class="col-sm-2 control-label">Nomor Reg. Laporan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('no_reg_lapor') }}" type="text" class="form-control" id="no_reg_lapor" name="no_reg_lapor">
                            </div>
                        </div>

                        {{--  <div class="form-group">
                            <label for="tgl_reg_lapor" class="col-sm-2 control-label">Tanggal Reg. Laporan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('tgl_reg_lapor') }}" type="date" class="form-control" id="tgl_reg_lapor" name="tgl_reg_lapor">
                            </div>
                        </div>  --}}
                        <div class="form-group">
                            <label for="tgl_reg_lapor" class="col-sm-2 control-label">Tanggal Reg. Laporan</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tgl_reg_lapor')}}" type="text" name="tgl_reg_lapor" id="tgl_reg_lapor" class="form-control">
                                </div>


                                @if ($errors->has('tgl_reg_lapor'))
                                    <span class="text-white">
                                        {{$errors->first('tgl_reg_lapor')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempat_kejadian" class="col-sm-2 control-label">Tempat Kejadian</label>
                            <div class="col-sm-10">
                                <textarea name="tempat_kejadian" id="tempat_kejadian" class="form-control">{{ old('tempat_kejadian') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pasal_pidanaPlg" class="col-sm-2 control-label">Pasal Pidana</label>
                            <div class="col-sm-10">
                                <input value="{{ old('pasal_pidanaPlg') }}" type="text" class="form-control" id="pasal_pidanaPlg" name="pasal_pidanaPlg">
                            </div>
                        </div>

                    </div>

                        {{--  DATA PELANGGARAN LAINNYA  --}}
                    <div class="box-body col-md-8 progress-bar-primary" style="margin-top: 20px;">
                        <center style="color: black;">
                            <h3>DATA PELANGGARAN LAINNYA</h3>
                            <h4>Diisi berdasarkan upaya kepolisian dalam melakukan pencegahan tindak pidana.</h4>
                        </center><br>
                        {{--  <div class="form-group">
                            <label for="tgl_reg_laporDll" class="col-sm-2 control-label">Tanggal Reg. Laporan</label>
                            <div class="col-sm-10">
                                <input value="{{ old('tgl_reg_laporDll') }}" type="date" class="form-control" id="tgl_reg_laporDll" name="tgl_reg_laporDll">
                            </div>
                        </div>  --}}
                        <div class="form-group">
                            <label for="tgl_reg_laporDll" class="col-sm-2 control-label">Tanggal Reg. Laporan</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('tgl_reg_laporDll')}}" type="text" name="tgl_reg_laporDll" id="tgl_reg_laporDll" class="form-control">
                                </div>


                                @if ($errors->has('tgl_reg_laporDll'))
                                    <span class="text-white">
                                        {{$errors->first('tgl_reg_laporDll')}}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempat_kejadianDll" class="col-sm-2 control-label">Tempat Kejadian</label>
                            <div class="col-sm-10">
                                <textarea name="tempat_kejadianDll" id="tempat_kejadianDll" class="form-control">{{ old('tempat_kejadianDll') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pasal_pidanaDll" class="col-sm-2 control-label">Pasal Pidana</label>
                            <div class="col-sm-10">
                                <input value="{{ old('pasal_pidanaDll') }}" type="text" class="form-control" id="pasal_pidanaDll" name="pasal_pidanaDll">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jns_pelanggaran" class="col-sm-2 control-label">Jenis Pelanggaran</label>
                            <div class="col-sm-10">
                                <textarea name="jns_pelanggaran" id="jns_pelanggaran" class="form-control">{{ old('jns_pelanggaran') }}</textarea>
                            </div>
                        </div>
                    </div>
                        <center>
                            <button style="margin-top: 50px; margin-left: 450px; " type="submit" class="btn btn-success pull-left">Submit</button>
                            <a href="{{route('pelaku.index')}}" style="margin-top: 50px; margin-left: 5px; " type="submit" class="btn btn-primary pull-left">Cancel</a>
                        </center>

                </form>
                </div>

            </div>
        </div>
    </div>

@endsection

