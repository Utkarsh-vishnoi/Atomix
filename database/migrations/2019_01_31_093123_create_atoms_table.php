<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atoms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 50);
            $table->text('description');
            $table->text('skel');
            $table->text('style');
            $table->text('func');
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
        Schema::dropIfExists('atoms');
    }
}
