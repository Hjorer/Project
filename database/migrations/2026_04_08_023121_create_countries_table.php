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
        Schema::create('countries', function (Blueprint $table) {
            $table->string('Code', 3)->primary();
            $table->string('Name', 52);
            $table->enum('Continent', ['Asia', 'Europe', 'North America', 'Africa', 'Oceania', 'Antarctica', 'South America']);
            $table->string('Region', 26);
            $table->integer('Population')->default(0);
            $table->float('LifeExpectancy', 3, 1)->nullable();
            $table->string('GovernmentForm', 45);
            $table->string('HeadOfState', 60)->nullable();
            $table->smallInteger('IndepYear')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
