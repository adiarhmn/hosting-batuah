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
        // Add Field Status to UserDetails Table
        Schema::table('user_details', function (Blueprint $table) {
            if (!Schema::hasColumn('user_details', 'status')) {
                $table->string('status')->default('active')->after('address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove Field Status from UserDetails Table
        Schema::table('user_details', function (Blueprint $table) {
            if (Schema::hasColumn('user_details', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
