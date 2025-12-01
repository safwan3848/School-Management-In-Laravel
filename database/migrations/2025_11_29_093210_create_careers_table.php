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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            // Personal
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();

            // Job / Qualification
            $table->string('position')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->integer('experience')->nullable(); // years
            $table->string('subjects')->nullable();
            $table->string('preferred_grade')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('availability')->nullable();

            // Documents
            $table->string('resume_path')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('other_docs_path')->nullable();

            // Meta
            $table->text('message')->nullable();
            $table->enum('status', ['new', 'reviewed', 'rejected', 'hired'])->default('new');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
