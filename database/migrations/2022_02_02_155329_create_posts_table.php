<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Para que asegurar que el dato siempre sea positivo

            $table->unsignedBigInteger('user_id');

            $table->string('title');

            //garantiza que el url sea unico
            $table->string('slug')->unique();


            $table->string('img')->nullable();


            $table->text('body');
            $table->text('iframe')->nullable();

            // Para crear llaves foraneas y unirse a la siguiente la tabla externa 
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
        Schema::dropIfExists('posts');
    }
}
