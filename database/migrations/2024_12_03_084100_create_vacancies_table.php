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

        Schema::create('vacancies', function (Blueprint $table) {
            $table->id()->foreign('invatations.vacancy_id');
            $table->string('name');
            $table->string('company_name');
            $table->string('images');
            $table->bigInteger('location_id');
            $table->bigInteger('salary');
            $table->bigInteger('sector_id');
            $table->string('description');
            $table->bigInteger('requirements');
            $table->boolean('hours');
            $table->bigInteger('awaiting');
            $table->bigInteger('wanted');
            $table->bigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
