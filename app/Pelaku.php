<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaku extends Model
{
    // protected $fillable = ['tgl_input', 'nik', 'sidik_jari', 'nama_lengkap', 'nama_alias', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'nama_jalan', 'rt', 'rw', 'desa_kel', 'kecamatan', 'kab_kot', 'provinsi', 'catatan', 'poto_depan', 'poto_kiri', 'poto_kanan', 'no_lap_polisi', 'tgl_lap_polisi', 'lok_kejadian', 'tgl_kejadian', 'pasal_pidana', 'jenis_hukuman', 'lama_hukuman', 'waktu_hukuman', 'poto_depan_pidmum', 'poto_kiri_pidmum', 'poto_kanan_pidmum', 'no_reg_lapor', 'tgl_reg_lapor', 'tempat_kejadian', 'pasal_pidanaPlg', 'tgl_reg_laporDll', 'tempat_kejadianDll', 'pasal_pidanaDll', 'jns_pelanggaran'];
    protected $guarded = [];
    protected $table = 'pelaku';
}
