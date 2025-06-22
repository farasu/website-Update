<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_id')->unsigned();
            $table->string('locale')->index();

            $table->longText('detail');

            $table->unique(['info_id', 'locale']);
            $table->foreign('info_id')->references('id')->on('infos')->onDelete('cascade');
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
        Schema::dropIfExists('info_translations');
    }
}
