<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriParentTable extends Migration {
    public function up() {
      Schema::create('kategori_parent', function(Blueprint $table) {
        $table->integer('child_id')->unsigned()->index();
        $table->foreign('child_id')
              ->references('id')->on('kategori')
              ->onDelete('cascade');
        $table->integer('parent_id')->unsigned()->index();
        $table->foreign('parent_id')
              ->references('id')->on('kategori')
              ->onDelete('cascade');
        $table->primary(['child_id', 'parent_id']);
        $table->timestamps();
      });
    }

    public function down() {
      Schema::drop('kategori_parent');
    }
}
