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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->text('description_en')->nullable();
            $table->unsignedBigInteger('course_category_id')->index();
            $table->unsignedBigInteger('instructor_id')->index();
            $table->unsignedBigInteger('typepayment_id')->index();
            $table->decimal('price', 10, 2)->default(0.00)->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('subscription_price', 10, 2)->nullable();
            $table->decimal('full_course_subscription', 10, 2)->nullable();
            $table->decimal('annual_subscription', 10, 2)->nullable();
            $table->decimal('weekly_subscription', 10, 2)->nullable();
            $table->decimal('daily_subscription', 10, 2)->nullable();
            $table->timestamp('start_from')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('lesson')->nullable();
            $table->text('prerequisites_en')->nullable();
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced'])->nullable();
            $table->string('course_code')->nullable();
            $table->string('image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('thumbnail_video')->nullable();
            $table->enum('tag', ['popular', 'featured', 'upcoming'])->nullable();
            $table->integer('status')->default(0)->comment('0 pending, 1 inactive, 2 active');
            $table->string('language')->default('en');
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
            $table->foreign('typepayment_id')->references('id')->on('typepayments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
