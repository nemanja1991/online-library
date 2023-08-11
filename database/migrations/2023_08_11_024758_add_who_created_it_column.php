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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('who_created_it');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->integer('who_created_it');
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->integer('who_created_it');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
