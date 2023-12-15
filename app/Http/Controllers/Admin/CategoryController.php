<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        return view('pages.admin.category.index', [
            'categories' => Category::get(),
            'hashId' => $this->hashId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $vaildated =  $request->validate([
            'name' => 'required|max:225',
            'is_active' => 'required|boolean',
            'image' => 'required|mimes:png,jpeg,jpg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'thumbnail_categories_'. Date('d_m_Y_His') .'.' . $file->getClientOriginalExtension();
            $filePath = 'images/food/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));;
            $vaildated['image'] = $filePath;
        }

        Category::create($vaildated);
        notify()->success('Added category successfully!');
        return redirect()->route('admin.categories.index');
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
        return view('pages.admin.category.edit', [
            'categories' => Category::FindOrFail($id),
            'hash' => $hash
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hashId = $this->hashId->decode($id);
        $category = Category::FindOrFail($hashId);
        $vaildated =  $request->validate([
            'name' => 'required|max:225',
            'is_active' => 'required|boolean',
            'image' => 'nullable|mimes:png,jpeg,jpg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = 'thumbnail_categories_'. Date('d_m_Y_His') .'.' . $file->getClientOriginalExtension();
            $filePath = 'images/food/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));;
            $vaildated['image'] = $filePath;
            if (Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
        }

        $category->update($vaildated);
        notify()->success('Updated category successfully!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Id = $this->hashId->decode($id);
        $category = Category::FindOrFail($Id);
        if (Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();
        notify()->success('Deleted category successfully!');
        return redirect()->back();
    }
}