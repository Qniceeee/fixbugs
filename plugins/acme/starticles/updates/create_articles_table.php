<?php namespace Acme\StArticles\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('acme_starticles_articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')
                ->on('acme_starticles_categories')
                ->onDelete('set null');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('show_content')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {

        Schema::dropIfExists('acme_starticles_articles');

    }
}
