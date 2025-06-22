<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('detail');

            $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');
            
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
        Schema::dropIfExists('advertisement_translations');
    }
}
