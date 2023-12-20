<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\Category;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            'foods' => Food::with('categories')->paginate(5),
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
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'is_available' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'required|integer|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'thumbnail_food_'. Date('d_m_Y_His') .'.' . $file->getClientOriginalExtension();
            $filePath = 'images/food/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));;
            $data['image'] = $filePath;
        }

        $food = Food::create($data);
        $food->categories()->attach($data['categories']);
        notify()->success('Food successfully created');
        return redirect()->route('admin.foods.index');
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
            'categories' => Category::pluck('name', 'id'),
            'hash' => $hash
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $hashId = $this->hashId->decode($id);
        $food = Food::FindOrFail($hashId);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'required|integer|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'thumbnail_food_'. Date('d_m_Y_His') .'.' . $file->getClientOriginalExtension();
            $filePath = 'images/food/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));;
            $data['image'] = $filePath;
            if (Storage::disk('public')->exists($food->image)) {
                Storage::disk('public')->delete($food->image);
            }
        }

        $food->update($data);
        $food->categories()->sync($data['categories']);
        notify()->success('Food successfully updated');
        return redirect()->route('admin.foods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hashId = $this->hashId->decode($id);
        $food = Food::FindOrFail($hashId);
        $food->categories()->detach();
        if (Storage::disk('public')->exists($food->image)) {
            Storage::disk('public')->delete($food->image);
        }
        $food->delete();
        notify()->success('Food successfully deleted');
        return redirect()->route('admin.foods.index');
    }
}
