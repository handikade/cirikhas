<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkspedisiTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ekspedisi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        Schema::table('paket', function (Blueprint $table) {
            $table->foreign('ekspedisi_id')
                  ->references('id')
                  ->on('ekspedisi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::table('paket', function(Blueprint $table) {
        $table->dropForeign('paket_ekspedisi_id_foreign');
      });

      Schema::drop('ekspedisi');
    }
}
