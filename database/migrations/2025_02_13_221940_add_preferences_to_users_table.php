<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('language')->default('fr'); 
        $table->string('theme')->default('light'); 
        $table->json('notifications')->nullable(); 
        $table->string('date_format')->default('Y-m-d'); 
        $table->string('time_format')->default('H:i:s'); 
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['language', 'theme', 'notifications', 'date_format', 'time_format']);
    });
}
};
