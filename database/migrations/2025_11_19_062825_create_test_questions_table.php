<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('test_questions', function (Blueprint $table) {
        $table->id();
        $table->string('question');
        $table->string('option_a');
        $table->string('option_b');
        $table->string('option_c')->nullable();
        $table->string('option_d')->nullable();
        $table->string('category'); // e.g., MBTI dimension: E/I, S/N, T/F, J/P
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('test_questions');
    }
};