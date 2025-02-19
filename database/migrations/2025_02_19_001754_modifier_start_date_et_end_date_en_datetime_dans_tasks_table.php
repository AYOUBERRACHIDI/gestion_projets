<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifierStartDateEtEndDateEnDatetimeDansTasksTable extends Migration
{
    /**
     * Exécuter les migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dateTime('start_date')->nullable()->change();
            $table->dateTime('end_date')->nullable()->change();
        });
    }

    /**
     * Annuler les migrations.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('start_date')->nullable()->change();
            $table->string('end_date')->nullable()->change();
        });
    }
}