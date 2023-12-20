<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChefController extends Controller
{
    protected $hashId;

    /**
     * ChefController constructor.
     *
     * @param HashIdService $hashIdService The HashIdService instance.
     */
    public function __construct(HashIdService $hashIdService)
    {
        $this->hashId = $hashIdService;
    }


    /**
     * Display the index page for the ChefController.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.admin.chef.index', [
            'chefs' => Chef::take(4)->get(),
            'hashId' => $this->hashId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'task' => 'required|string|min:3|max:255',
            'facebook' => 'nullable|string|min:3|max:255',
            'twitter' => 'nullable|string|min:3|max:255',
            'instagram' => 'nullable|string|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = 'thumbnail_chef_'. Date('d_m_Y_His') .'.' . $file->getClientOriginalExtension();
            $filePath = 'images/chef/' . $fileName;
            Storage::disk('public')->put($filePath, file_get_contents($file));
            $data['image'] = $filePath;
        }

        Chef::create($data);
        notify()->success('Chef created successfully!');
        return redirect()->route('admin.chefs.index');
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
