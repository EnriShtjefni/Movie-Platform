<?php

namespace App\Http\Services;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesServices
{
    public function save(Request $request, Movie $movie = null) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'year' => 'required|integer',
            'status' => 'required',
            'company_id' => 'required',
            'categories' => 'required|array',
        ]);

        if($request->isMethod('POST')){
            $movie = new Movie();
        }

        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->year = $request->input('year');
        $movie->status = $request->input('status');
        $movie->company_id = $request->input('company_id');
        $movie->save();

        $movie->categories()->sync($request->input('categories'));

        return $movie;
    }
}
