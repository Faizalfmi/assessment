<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik');
            $table->string('alamat_ktp');
            $table->string('alamat_sekarang');
            $table->bigInteger('id_provinsi')->unsigned();
            $table->foreign('id_provinsi')->references('id')->on('provinces')->onDelete('cascade');
            $table->bigInteger('id_kota')->unsigned();
            $table->foreign('id_kota')->references('id')->on('cities')->onDelete('cascade');
            $table->string('kecamatan');
            $table->string('telepon');
            $table->string('hp');
            $table->string('email');
            $table->string('kewargaan');
            $table->string('tgl_lahir');
            $table->bigInteger('provinsi_lahir')->unsigned();
            $table->foreign('provinsi_lahir')->references('id')->on('provinces')->onDelete('cascade');
            $table->bigInteger('kota_lahir')->unsigned();
            $table->foreign('kota_lahir')->references('id')->on('cities')->onDelete('cascade');
            $table->string('kelamin');
            $table->string('status');
            $table->string('agama');
            $table->string('picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
