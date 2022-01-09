<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocabularyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabulary', function (Blueprint $table) {
            $table->id();
            $table->text('hanzi')->nullable();
            $table->text('pinyin')->nullable();
            $table->text('meaning');
            $table->unsignedBigInteger('hsk_id');
            $table->smallInteger('order')->nullable();
            $table->foreign('hsk_id')->references('id')->on('hsk');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vocabulary');
    }
}
