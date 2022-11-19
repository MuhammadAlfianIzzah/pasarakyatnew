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
        Schema::create('penjuals', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama");
            $table->text("deskripsi");
            $table->text("alamat_lengkap");
            $table->string("logo");
            $table->string("lat");
            $table->foreignUuid("kabupaten_id");
            $table->foreign("kabupaten_id")->references("id")->on("kabupatens");
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
        Schema::dropIfExists('penjuals');
    }
};
