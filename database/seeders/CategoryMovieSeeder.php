<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieIds = Movie::pluck('id')->toArray(); //extract certain values from the collection
        $categoryIds = Category::pluck('id')->toArray();

        foreach ($movieIds as $movieId) {
            $movie = Movie::find($movieId); //get a random movie instance by ID

            $movie->categories()->attach(
                collect($categoryIds)->random(rand(1, 3))->toArray() //attach 1 to 3 random categories to each movie by their IDs
            );
        }
    }
}
