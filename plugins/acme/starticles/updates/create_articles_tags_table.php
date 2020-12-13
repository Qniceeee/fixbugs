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
            $table->string('article_id')->unsigned();
            $table->string('tag_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('acme_starticles_articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('acme_sttags_tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_starticles_articles_tags');
    }
}
