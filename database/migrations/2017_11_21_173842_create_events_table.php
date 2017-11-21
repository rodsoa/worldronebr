<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_category_id')->unsigned();
            $table->string('name');
            $table->text('content');
            $table->date('beginning');
            $table->date('end');
            $table->string('address');
            $table->timestamps();

            $table->foreign('event_category_id')
                ->references('id')
                ->on('event_category')
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
        // Primeiro deletar os indices constraints
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_event_category_id_foreign');
        });
        Schema::dropIfExists('events');
    }
}
