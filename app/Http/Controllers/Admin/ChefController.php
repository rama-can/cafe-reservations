<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;
use App\Models\Chef;

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
            'chefs' => Chef::take(3)->get(),
            'hashId' => $this->hashId
        ]);
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