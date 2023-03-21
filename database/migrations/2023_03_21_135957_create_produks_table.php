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
            $table->id();
            $table->string('nm_produk');
            $table->unsignedBigInteger('merek_id');
            $table->foreign('merek_id')
            ->references('id')
            ->on('mereks')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')
            ->references('id')
            ->on('kategoris')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('img_4');
            $table->string('harga');
            $table->string('stock');
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
        Schema::table('produkss', function (Blueprint $table) {
            $table->dropForeign(['merek_id']);
            $table->dropColumn('merek_id');
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
