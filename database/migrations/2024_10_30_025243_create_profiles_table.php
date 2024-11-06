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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama_lengkap');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('alamat');
            $table->string('agama');
            $table->string('cover');
            $table->timestamps();
        });

        Schema::create('hobi_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profile')->onDelete('cascade');
            $table->foreignId('id_hobi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
