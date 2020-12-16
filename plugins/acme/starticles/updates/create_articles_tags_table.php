<?php namespace Acme\StArticles\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTagsTable extends Migration
{
    public function up()
    {
        Schema::create('acme_starticles_articles_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('article_id')
                ->references('id')
                ->on('acme_starticles_articles')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('acme_starticles_tags')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_starticles_articles_tags');
    }
}
