<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoMetasTable extends Migration
{
    public function up()
{
    Schema::create('seo_metas', function (Blueprint $table) {
        $table->id();
        $table->integer('page');
        $table->text('title');
        $table->text('description');
        $table->text('keywords');
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('seo_metas');
    }
}
