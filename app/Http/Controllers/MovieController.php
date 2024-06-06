<?php

namespace App\Http\Controllers;

use App\Http\Services\MoviesServices;
use App\Models\Category;
use App\Models\Company;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(protected MoviesServices $moviesServices) {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 3);

        $search = $request->input('search');
        $companyId = $request->input('company_id');
//        $categoryId = $request->input('category_id');
        $categoryId = $request->input('categories', []);
        $order = $request->input('order');

        $movies = Movie::with('company', 'categories')
            ->advancedSearch($search)
            ->searchByCompany($companyId)
            ->searchByCategory($categoryId)
            ->orderByYear($order)
            ->paginate($perPage)->withQueryString();

        $companies = Company::all();
        $categories = Category::all();

        return view('movies.index', compact('movies', 'companies', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = $this->moviesServices->save($request);

        return redirect()->route('movies.index')->with('success', 'Movie '.$movie->title.' created successfully.');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        $movie = Movie::find($id);
//
//        return view('movies.show', compact('movie'));
//    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie = $this->moviesServices->save($request, $movie);

        return redirect()->route('movies.index')->with('success', 'Movie '.$movie->title.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(int $id)
//    {
//        $movie = Movie::find($id);
//        $movie->delete();
//
//        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
//    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $companies = Company::all();
        $categories = Category::all();
        return view('movies.create', compact('companies', 'categories'));
    }


    /**
     * Show the form for editing the specified post.
     */
//    public function edit($id)
//    {
//        $movie = Movie::find($id);
//        $companies = Company::all();
//        $categories = Category::all();
//        return view('movies.edit', compact('movie', 'companies', 'categories'));
//    }

    public function edit(Movie $movie)
    {
        $companies = Company::all();
        $categories = Category::all();
        return view('movies.edit', compact('movie', 'companies', 'categories'));
    }
}
