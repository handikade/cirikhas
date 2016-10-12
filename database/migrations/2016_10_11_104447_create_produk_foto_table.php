<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukFotoTable extends Migration {
   public function up() {
     Schema::create('produk_foto', function (Blueprint $table) {
       $table->integer('produk_id')->unsigned()->index();
       $table->foreign('produk_id')
             ->references('id')->on('produk')
             ->onDelete('cascade');
       $table->integer('foto_id')->unsigned()->index();
       $table->foreign('foto_id')
             ->references('id')->on('foto')
             ->onDelete('cascade');
       $table->timestamps();
     });
   }

   public function down() {
     Schema::table('produk_gambar', function(Blueprint $table) {
       $table->dropForeign(['produk_id', 'foto_id']);
     });

     Schema::drop('produk_gambar');
   }
 }
