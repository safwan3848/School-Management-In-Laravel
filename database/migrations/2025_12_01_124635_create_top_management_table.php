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
        Schema::create('top_management', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation'); // Principal, Director, etc.
            $table->string('photo')->nullable();
            $table->text('message')->nullable(); // Principal/Director message
            $table->tinyInteger('status')->default(1); // Active/Inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_management');
    }
};
