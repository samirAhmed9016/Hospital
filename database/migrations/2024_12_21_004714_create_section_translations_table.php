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
        Schema::create('section_translations', function (Blueprint $table) {

            $table->id();

            // Locale field
            $table->string('locale', 10)->index();

            // Foreign key to the 'sections' table
            $table->foreignId('section_id')
                ->constrained('sections')
                ->cascadeOnDelete();


            $table->unique(['section_id', 'locale']);

            // Translated fields
            $table->string('name', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_translations');
    }
};
