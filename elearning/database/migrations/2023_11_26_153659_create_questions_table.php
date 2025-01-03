<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id')->index();
            $table->text('content')->nullable(false);
            $table->enum('type', ['multiple_choice', 'true_false', 'short_answer'])->nullable(false);
            $table->text('option_a')->nullable('NULL');
            $table->text('option_b')->nullable('NULL');
            $table->text('option_c')->nullable('NULL');
            $table->text('option_d')->nullable('NULL');
            $table->text('correct_answer')->nullable('NULL');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
