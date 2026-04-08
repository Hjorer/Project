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
        Schema::create('country_languages', function (Blueprint $table) {
            $table->string('CountryCode', 3); // Внешний ключ на Country
            $table->string('Language', 30);
            $table->enum('IsOfficial', ['T', 'F'])->default('F');
            $table->float('Percentage', 4, 1)->default(0.0);
            $table->timestamps();
            $table->foreign('CountryCode')->references('Code')->on('countries')->onDelete('cascade');
            $table->primary(['CountryCode', 'Language']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_languages');
    }
};
