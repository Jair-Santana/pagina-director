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
        // cambiar la columna description por type
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('description', 'type');
            $table->renameColumn('image_path', 'url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('type', 'description');
            $table->renameColumn('url', 'image_path');
        });
    }
};
