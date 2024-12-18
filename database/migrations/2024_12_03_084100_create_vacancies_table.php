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
            $table->string('logo')->nullable();
            $table->string('job_title');
            $table->string('company_name');
            $table->string('media')->nullable();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->decimal('salary', 8, 2);
            $table->bigInteger('sector_id');
            $table->string('description');
            $table->string('requirements');
            $table->integer('hours');
            $table->bigInteger('awaiting')->nullable()->default(0);
            $table->bigInteger('wanted');
            $table->string('offers');
            $table->bigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
