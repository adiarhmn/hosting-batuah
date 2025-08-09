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

        // Create the Package table
        Schema::create('package', function (Blueprint $table) {
            $table->id();
            $table->string('name_package', 150)->unique();
            $table->string('bandwidth', 50)->nullable();
            $table->string('disk_space', 50)->nullable();
            $table->integer('max_subdomains')->default(0);
            $table->integer('max_db_mysql')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // Create the domain table
        Schema::create('domain', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('url')->unique()->nullable();
            $table->enum('status', ['active', 'unknown', 'suspended', 'pending'])->default('unknown');
            $table->string('code')->unique()->nullable();
            $table->string('username')->unique();
            $table->timestamp('expires_at')->nullable();
            $table->foreignId('package_id')->nullable()->constrained('package')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain');
        Schema::dropIfExists('package');
    }
};
