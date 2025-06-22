<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerroTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herro_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('herro_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('detail');

            $table->unique('herro_id', 'locale');
            $table->foreign('herro_id')->references('id')->on('herros')->onDelete('cascade');
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
        Schema::dropIfExists('herro_translations');
    }
}
