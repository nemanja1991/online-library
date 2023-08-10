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
        Schema::table('users', function (Blueprint $table) 
        {
            if (! Schema::hasColumn('users', 'user_type')) {
                $table->timestamp('user_type')->nullable()->after('password');
            }

            if (! Schema::hasColumn('users', 'surname')) {
                $table->timestamp('surname')->nullable()->after('surname');
            }

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
