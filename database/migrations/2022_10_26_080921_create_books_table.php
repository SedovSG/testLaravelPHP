<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название книги');
            $table->date('date')->comment('Дата публикации');
            $table->string('describe')->nullable()->comment('Описание книги');
            $table->integer('user_id')->unsigned()->comment('Идентификатор автора книги');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('books');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
