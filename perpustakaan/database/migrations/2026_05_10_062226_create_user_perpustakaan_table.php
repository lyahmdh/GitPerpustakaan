<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_perpustakaan', function (Blueprint $table) {

            $table->id('id_user');

            $table->string('nim')->unique();

            $table->string('nama');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_perpustakaan');
    }
};
