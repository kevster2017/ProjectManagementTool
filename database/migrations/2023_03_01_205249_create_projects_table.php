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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->string('pmName');
            $table->string('projectName');
            $table->string('type');
            $table->text('description');
            $table->string('stage');
            $table->string('rag');
            $table->float('budget');
            $table->string('sponsor');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('archived');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
