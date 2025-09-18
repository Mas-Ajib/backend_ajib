<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jenis_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis_pegawai')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_pegawais');
    }
};