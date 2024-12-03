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
        Schema::disableForeignKeyConstraints();

        Schema::create('requirement_skill', function (Blueprint $table) {
            $table->id()->foreign('vacancies.requirements');
            $table->bigInteger('requirement_id');
            $table->bigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_skill');
    }
};
