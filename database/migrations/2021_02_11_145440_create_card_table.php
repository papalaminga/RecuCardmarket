<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {

            $table->increments('IDcarta');
            $table->string('Name')->required();
            $table->enum('Type',['Land','Artifact','Creature','Sorcery','Instant','Enchantament','Planeswalker'])->required();
            $table->text('Description')->required();
            $table->string('Colection')->required();
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
        Schema::dropIfExists('card');
    }
}
