<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    protected $hashId;

    /**
     * CategoryController constructor.
     *
     * @param HashIdService $hashIdService The HashIdService instance.
     */
    public function __construct(HashIdService $hashIdService)
    {
        $this->hashId = $hashIdService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.food.index', [
            'foods' => Food::with('categories')->latest()->paginate(5),
            'categories' => Category::all(),
            'hashId' => $this->hashId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.food.create', [
            'categories' => Category::all()
        ]);
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
        $hash = $this->hashId;
        $id = $hash->decode($id);
        return view('pages.admin.food.edit', [
            'food' => food::FindOrFail($id),
            'categories' => Category::all(),
            'hash' => $hash
        ]);
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