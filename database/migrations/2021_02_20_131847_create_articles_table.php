<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_user_id');
            $table->foreignId('article_category_id');
            $table->string('article_title');
            $table->string('article_slug');
            $table->text('article_content');
            $table->string('article_thumbnail')->nullable();
            $table->string('article_status', 20)->nullable();
            $table->bigInteger('article_view_count')->nullable();
            $table->timestamp('edited_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
