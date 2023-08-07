<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('nisn');
            $table->unique('nisn');
            $table->string('namalengkap');
            $table->string('namapanggilan');
            $table->string('tempatlahir');
            $table->string('tanggallahir');
            $table->string('email');
            $table->string('password');
            $table->string('jurusan');
            $table->string('alasan');
            $table->string('jeniskelamin');
            $table->string('hobi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
