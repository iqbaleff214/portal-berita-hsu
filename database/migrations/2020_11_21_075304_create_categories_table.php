<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        // Schema::table('news', function (Blueprint $table)
        // {
    //     $table->foreignId('category_id')->constrained('categories');
        // });
        // Schema::dropIfExists('news');
        // Schema::create('news', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('image')->nullable();
        //     $table->text('content');
        //     $table->timestamps();
        //     $table->foreignId('user_id')->constrained();
        //     $table->foreignId('category_id')->constrained('categories');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
