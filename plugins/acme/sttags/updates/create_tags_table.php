<?php namespace Acme\StTags\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('acme_sttags_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tag_name');
            $table->string('slug')->unique()->nullable();
            $table->boolean('show_content')->default(true);
            $table->integer('sort_order')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_sttags_tags');
    }
}
