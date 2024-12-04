<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('vacature_name'); // Name of the vacancy
            $table->string('bedrijf_name'); // Name of the bedrijf
            $table->unsignedBigInteger('sector_id'); // Sector ID (no foreign key)
            $table->text('images')->nullable(); // Images, stored as text (e.g., JSON)
            $table->unsignedBigInteger('user_id'); // User ID (no foreign key)
            $table->string('caption')->nullable(); // Optional caption
            $table->boolean('is_active')->default(true); // Indicates if the vacancy is active
            $table->string('location'); // Location of the vacancy
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancy');
    }
}
