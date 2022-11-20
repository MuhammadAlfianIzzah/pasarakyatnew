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
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama");
            $table->text("slug");
            $table->text("deskripsi");
            $table->integer("harga");
            $table->softDeletes();
            $table->foreignUuid("penjual_id")->nullable();
            $table->foreign("penjual_id")->references("id")->on("penjuals");
            $table->foreignUuid("vendor_id")->nullable();
            $table->foreign("vendor_id")->references("id")->on("vendors");
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
        Schema::dropIfExists('produks');
    }
};
