<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaku', function (Blueprint $table) {
            //data tersangkaa
            $table->bigIncrements('id');
            $table->date('tgl_input');
            $table->bigInteger('nik');
            $table->string('sidik_jari')->nullable();
            $table->string('nama_lengkap');
            $table->string('nama_alias')->nullable();
            $table->enum('jenis_kelamin', ['laki', 'perempuan'])->nullable();
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('nama_jalan')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa_kel')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kab_kot')->nullable();
            $table->string('provinsi')->nullable();
            $table->text('catatan')->nullable();
            $table->string('poto_depan');
            $table->string('poto_kiri')->nullable();
            $table->string('poto_kanan')->nullable();

            //data tindak pidana umum
            $table->string('no_lap_polisi')->nullable();
            $table->date('tgl_lap_polisi')->nullable();
            $table->text('lok_kejadian')->nullable();
            $table->date('tgl_kejadian')->nullable();
            $table->string('pasal_pidana')->nullable();
            $table->string('jenis_hukuman')->nullable();
            $table->string('lama_hukuman')->nullable();
            $table->string('waktu_hukuman')->nullable();
            $table->string('poto_depan_pidmum')->nullable();
            $table->string('poto_kiri_pidmum')->nullable();
            $table->string('poto_kanan_pidmum')->nullable();

            //data pelanggaran
            $table->string('no_reg_lapor')->nullable();
            $table->date('tgl_reg_lapor')->nullable();
            $table->text('tempat_kejadian')->nullable();
            $table->string('pasal_pidanaPlg')->nullable();

            //data pelanggaran lainnya
            $table->date('tgl_reg_laporDll')->nullable();
            $table->text('tempat_kejadianDll')->nullable();
            $table->string('pasal_pidanaDll')->nullable();
            $table->text('jns_pelanggaran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaku');
    }
}
