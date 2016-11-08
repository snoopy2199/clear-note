<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('help_id');
            $table->unsignedInteger('relative_help_id');
        });

        Schema::table('help_relations', function (Blueprint $table) {
            $table->foreign('help_id')
                ->references('id')->on('helps')
                ->onDelete('cascade');
            $table->foreign('relative_help_id')
                ->references('id')->on('helps')
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
        Schema::dropIfExists('help_relations');
    }
}
