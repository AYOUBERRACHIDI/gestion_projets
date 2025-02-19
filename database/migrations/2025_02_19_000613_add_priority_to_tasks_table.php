<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriorityToTasksTable extends Migration
{
    /**
     * Exécuter les migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Ajouter la colonne priority
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        });
    }

    /**
     * Annuler les migrations.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Supprimer la colonne priority
            $table->dropColumn('priority');
        });
    }
}
