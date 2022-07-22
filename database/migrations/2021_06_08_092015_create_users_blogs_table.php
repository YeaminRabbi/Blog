<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_blogs', function (Blueprint $table) {
            $table->id();
            $table->text('title');  
            $table->string('category');
            $table->text('description');
            $table->string('image');
            $table->text('highlightedText');
            $table->string('status')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->integer('view_count');
            $table->softDeletes();
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
        Schema::dropIfExists('users_blogs');
    }
}
