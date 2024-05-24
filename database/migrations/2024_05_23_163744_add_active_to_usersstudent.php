<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('status', function (Blueprint $table) {
        $table->string('status')->default('inactive');
    });
}

public function down()
{
    Schema::table('status', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};