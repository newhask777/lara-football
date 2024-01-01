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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();

            $table->integer('event_id');
            $table->string('competition_name')->nullable();
            $table->string('competition_cluster')->nullable();
            $table->string('federation')->nullable();
            $table->string('season')->nullable();
            $table->date('date')->nullable();
            $table->string('start_date')->nullable();
            $table->string('time')->nullable();
            $table->string('home_team')->nullable();
            $table->string('away_team')->nullable();
            $table->string('status')->nullable();
            $table->string('result')->nullable();
            $table->string('prediction')->nullable();
            $table->boolean('is_expired')->nullable();
//            $table->json('odds');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
