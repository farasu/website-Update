<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_service_id')->unsigned();
            $table->string('locale')->index();

            $table->longText('detail');

            $table->foreign('main_service_id')->references('id')->on('main_services')->onDelete('cascade');
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
        Schema::dropIfExists('main_service_translations');
    }
}
