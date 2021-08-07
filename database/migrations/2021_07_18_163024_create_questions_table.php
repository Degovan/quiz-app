<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("quiz_id");
            $table->foreign("quiz_id")->references("id")->on("quizzes")->onDelete("cascade");
            $table->integer("number");
            $table->text("question_title");
            $table->text("option_a");
            $table->text("option_b");
            $table->text("option_c");
            $table->text("option_d");
            $table->string("key");
            $table->double("score");
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
        Schema::dropIfExists('questions');
    }
}
