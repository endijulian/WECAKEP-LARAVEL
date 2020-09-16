@extends('template.template')

@section('title')
    Detail Data Tersangka
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="{{route('pelaku.index')}}" class="btn btn-success pull-right">Kembali</a>
                </div>

                <div class="box-body">
                    {{--  DATA IDENTITAS TERSANGKA  --}}
                    <div class="box-body col-md-8 center-block">
                        <center style="color: black">
                            <h3>Data Identitas Tersangka</h3>
                        </center><br>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">NAMA LENGKAP</label>
                            <label>{{$pelaku->nama_lengkap}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NAMA ALIAS</label>
                            <label>{{$pelaku->nama_alias}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">JENIS KELAMIN</label>
                            <label>{{$pelaku->jenis_kelamin}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">AGAMA</label>
                            <label>{{$pelaku->agama}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">TEMPAT LAHIR</label>
                            <label>{{$pelaku->tempat_lahir}} - {{$pelaku->tanggal_lahir}} - Umur {{$pelaku->umur}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">NAMA JALAN</label>
                            <label>{{$pelaku->nama_jalan}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <label>RT {{$pelaku->rt}} RW {{$pelaku->rw}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">DESA/KELURAHAN</label>
                            <label>{{$pelaku->desa_kel}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">KECAMATAN</label>
                            <label>{{$pelaku->kecamatan}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">KABUPATEN/KOTA</label>
                            <label>{{$pelaku->kab_kot}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">PROVINSI</label>
                            <label>{{$pelaku->provinsi}}</label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">RUMUS SIDIK JARI</label>
                            <label>{{$pelaku->sidik_jari}}</label>
                        </div>

                        <br>
                        <h4 style="color: black; margin-left:15px;">TINDAK PIDANA UMUM</h4>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">1. TEMPAT :</label>
                            <label>{{$pelaku->lok_kejadian}}</label>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 15px;" class="col-sm-2 control-label"> WAKTU :</label>
                            <label >{{$pelaku->tgl_kejadian}}</label>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 15px;" class="col-sm-2 control-label"> PASAL   :</label>
                            <label >{{$pelaku->pasal_pidana}}</label>
                        </div>

                        <h4 style="color: black; margin-left:15px;">TINDAK PIDANA KHUSUS</h4>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">1. TEMPAT :</label>
                            <label>{{$pelaku->tempat_kejadian}}</label>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 15px;" class="col-sm-2 control-label"> WAKTU :</label>
                            <label >{{$pelaku->tgl_reg_lapor}}</label>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 15px;" class="col-sm-2 control-label"> PASAL   :</label>
                            <label >{{$pelaku->pasal_pidanaPlg}}</label>
                        </div>

                    </div>
                    <div class="box-body col-md-4">

                        <div class="form-group">
                            <label for="poto_depan" class="col-sm-8 control-label">Poto Tampak Depan</label>
                            <div class="col-sm-12">
                                <img src="{{asset('uploads/depan/'. $pelaku->poto_depan)}}" alt="Poto Tidak di Upload" class="img-thumbnail" width="400px" style="height: 300px;" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="poto_kiri" class="col-sm-8 control-label">Poto Tampak Kiri</label>
                            <div class="col-sm-12">
                                <img src="{{asset('uploads/kiri/'. $pelaku->poto_kiri)}}" alt="" class="img-thumbnail" width="400px" style="height: 300px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="poto_kanan" class="col-sm-8 control-label">Poto Tampak Kanan</label>
                            <div class="col-sm-12">
                                <img src="{{asset('uploads/kanan/'. $pelaku->poto_kanan)}}" alt="" class="img-thumbnail" width="400px" style="height: 300px;">
                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>

@endsection
