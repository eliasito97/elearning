<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('typepayments', function (Blueprint $table) {
            $table->id();
            $table->string('typepayment_plan');
            $table->timestamps();
        });
        DB::table('typepayment')->insert([
            [
                'typepayment_plan'=> 'full_course_subscription',
                'created_at'=> Carbon::now()
            ],
            [
                'typepayment_plan'=> 'annual_subscription',
                'created_at'=> Carbon::now()
            ],
            [
                'typepayment_plan'=> 'weekly_subscription',
                'created_at'=> Carbon::now()
            ],
            [
                'typepayment_plan'=> 'daily_subscription',
                'created_at'=> Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typepayment');
    }
};
