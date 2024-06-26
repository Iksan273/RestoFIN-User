<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Promo;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $recommendation = Recommendation::all();
        $menus = Menu::all()->groupBy('categories_id');
        $promo = Promo::latest()->first();
        $recmenu = Recommendation::all()->groupBy('menus_id');

        return view('menu', compact('categories', 'menus', 'recommendation', 'recmenu', 'promo'));
    }

    public function menulist()
    {
        $categories = Category::all();
        $recommendation = Recommendation::all();
        $menus = Menu::all()->groupBy('categories_id');
        $recmenu = Recommendation::all()->groupBy('menus_id');
        $promo = Promo::latest()->first();
        return view('menulist', compact('categories', 'menus', 'recommendation', 'recmenu', 'promo'));
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
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
