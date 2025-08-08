<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ✅ Only create if table does NOT already exist
        if (!Schema::hasTable('certificates')) {
            Schema::create('certificates', function (Blueprint $table) {
                $table->id();
                $table->string('cert_id')->unique();
                $table->integer('user_id');
                $table->integer('course_id');
                $table->date('issued_on');
                $table->string('pdf_path');
                $table->boolean('verified')->default(1);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optional: only drop if you’re okay with deleting the table
        // Schema::dropIfExists('certificates');
    }
};
