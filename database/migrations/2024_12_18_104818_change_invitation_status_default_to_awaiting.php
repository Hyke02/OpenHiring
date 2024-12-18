<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInvitationStatusDefaultToAwaiting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter the 'status' column and set the default value to 'awaiting'
        Schema::table('invatations', function (Blueprint $table) {
            $table->string('status')->default('awaiting')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Optionally, you can define the previous default value here (if any)
        Schema::table('invatations', function (Blueprint $table) {
            $table->string('status')->default(null)->change(); // or set it to the original default if any
        });
    }
}
