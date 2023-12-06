<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display the index page for the SettingController.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.admin.settings.index', [
            'data' => \App\Models\Setting::pluck('value', 'key')->toArray()
        ]);
    }

    /**
     * Update the settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|max:255',
            'copyright' => 'required|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $fileName = 'logo.'.$logo->getClientOriginalExtension();
                $filePath = $logo->storeAs('public/images', $fileName);
                \App\Models\Setting::where('key', 'logo')->update(['value' => $filePath]);
            }
            $requestData = $request->except('logo');

            foreach ($requestData as $key => $value) {
                \App\Models\Setting::where('key', $key)->update(['value' => $value]);
            }
            notify()->success('Settings updated successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
