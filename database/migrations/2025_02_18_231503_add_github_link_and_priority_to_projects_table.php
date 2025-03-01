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
    Schema::table('projects', function (Blueprint $table) {
        $table->string('github_link')->nullable();
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropColumn('github_link');
        $table->dropColumn('priority');
    });
}
};
