<?php
namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;

class Task5Controller extends Controller
{
    public function task5()
    {
        $southAmerica = Country::where('Continent', 'South America')
            ->select('Name', 'Population')
            ->get();
        $topCities = City::orderBy('Population', 'desc')
            ->take(10)
            ->get(['Name', 'Population']);
        $japan = Country::find('JPN');
        $japanHead = $japan ? $japan->HeadOfState : 'Не найдено';
        $avgLifeEurope = Country::where('Continent', 'Europe')->avg('LifeExpectancy');
        $republicsOrLarge = Country::where('GovernmentForm', 'Republic')
            ->orWhere('Population', '>', 100000000)
            ->get();
        $france = Country::where('Code', 'FRA')->with('languages')->first();
        $franceLanguages = $france ? $france->languages : [];
        $hugeCityCountries = Country::whereHas('cities', function($query) {
            $query->where('Population', '>', 5000000);
        })->get();
        $kabul = City::find(1);
        if ($kabul) {
            $kabul->update(['Population' => 2000000]);
        }
        $middleEast = Country::with('cities')
            ->where('Region', 'Middle East')
            ->take(5)
            ->get();
        $randomIndependent = Country::independent()->inRandomOrder()->take(5)->get();
        return response()->json([
            'Task 1' => $southAmerica,
            'Task 2' => $topCities,
            'Task 3' => $japanHead,
            'Task 4' => $avgLifeEurope,
            'Task 9' => $middleEast,
            'Task 10' => $randomIndependent
        ]);
    }
}
