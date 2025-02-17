<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use App\Models\SkillCategory;
use App\Models\Product;
use App\Models\Social;
use App\Models\Technology;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::first();
        $languages = Language::orderByDesc('priority')->get();
        $skillCategories = SkillCategory::orderByDesc('priority')->get();
        $products = Product::where('status', 'published')->orderByDesc('priority')->limit(3)->get();
        $socials = Social::where('status', 'published')->orderByDesc('priority')->limit(3)->get();
        $technologies = Technology::where('is_public', true)->get();
        return view('home', compact('user', 'languages', 'skillCategories', 'products', 'socials', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
