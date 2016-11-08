<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('note_id');
            $table->text('title')->nullable();
            $table->text('content')->nullable();
        });

        Schema::table('cues', function ($table) {
            $table->foreign('note_id')
                ->references('id')->on('notes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cues');
    }
}
