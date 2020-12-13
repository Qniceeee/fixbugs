<?php namespace Acme\StFeedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('acme_stfeedback_feedback', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->longText('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_stfeedback_feedback');
    }
}
