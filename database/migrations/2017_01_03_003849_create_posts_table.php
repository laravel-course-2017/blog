<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('image',255)->nullable();
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('tagline',255)->nullable();
            $table->text('announce')->nullable();
            $table->text('fulltext')->nullable();
            $table->integer('views_count')->nullable()->default(0);
            $table->string('status',10)->default('OWNER');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_favorite')->default(0);
            $table->timestamp('active_from')->nullable();
            $table->timestamp('active_to')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
