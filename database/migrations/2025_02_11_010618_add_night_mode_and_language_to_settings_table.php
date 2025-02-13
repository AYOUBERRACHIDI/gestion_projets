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
    Schema::table('settings', function (Blueprint $table) {
        $table->boolean('night_mode')->default(false); // Mode nuit (activé/désactivé)
        $table->string('language')->default('fr'); // Langue par défaut (ex: 'fr' pour français)
    });
}

public function down()
{
    Schema::table('settings', function (Blueprint $table) {
        $table->dropColumn('night_mode');
        $table->dropColumn('language');
    });
}
};
