<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status_pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jenis_pegawai_id')->constrained('jenis_pegawais');
            $table->string('status_pegawai');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_pegawais');
    }
};