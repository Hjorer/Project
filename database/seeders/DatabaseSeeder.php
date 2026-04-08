<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CitiesFactory;
use Database\Factories\CountriesFactory;
use Database\Factories\CountryLanguagesFactory;
use Illuminate\Database\Seeder;
use App\Models\country;
use App\Models\city;
use App\Models\country_languages;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
           $categories = \App\Models\Categories::factory(5)->create();
        \App\Models\Categories::factory(10)->create();
         \App\Models\Products::factory(20)->recycle($categories)->create();
        \App\Models\userstask4::factory(10)->create();
        \App\Models\productstask4::factory(10)->create();
        \App\Models\articlesstask4::factory(10)->create();
        $japan = Country::factory()->create([
            'Code' => 'JPN',
            'Name' => 'Japan',
            'HeadOfState' => 'Naruhito'
        ]);
        $france = Country::factory()->create([
            'Code' => 'FRA',
            'Name' => 'France'
        ]);
        country_languages::create(['CountryCode' => 'FRA', 'Language' => 'French', 'IsOfficial' => 'T', 'Percentage' => 95.0]);
        country_languages::create(['CountryCode' => 'FRA', 'Language' => 'Arabic', 'IsOfficial' => 'F', 'Percentage' => 3.0]);
        City::factory()->create([
            'id' => 1,
            'Name' => 'Kabul',
            'CountryCode' => Country::factory()->create(['Code' => 'AFG'])->Code
        ]);
        Country::factory(20)->create()->each(function ($country) {
            City::factory(rand(3, 5))->create([
                'CountryCode' => $country->Code
            ]);
            country_languages::create([
                'CountryCode' => $country->Code,
                'Language' => 'English',
                'IsOfficial' => 'F',
                'Percentage' => 10.0
            ]);
        });
    }
}
