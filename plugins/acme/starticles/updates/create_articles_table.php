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
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('show_content')->default(true);
            $table->timestamps();
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('acme_stcategories_categories')
                ->onDelete('set null');
        });
    }

    public function down()
    {
       Schema::dropIfExists('acme_starticles_articles');
    }
}
