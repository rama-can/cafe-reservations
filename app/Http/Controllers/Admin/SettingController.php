<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    protected $settingsData;

    public function __construct()
    {
        $this->settingsData = cache()->remember('settings_data', now()->addHours(6), function () {
            return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Display the site setting page for the SettingController.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function site()
    {
        return view('pages.admin.settings.site', [
            'data' => $this->settingsData
        ]);
    }

    /**
     * Display the site banner page.
     *
     * @return \Illuminate\Http\Response
     */
    public function banner()
    {
        return view('pages.admin.settings.banner', [
            'data' => $this->settingsData
        ]);
    }

    public function about()
    {
        return view('pages.admin.settings.about', [
            'data' => $this->settingsData
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
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'site_name' => 'nullable|string|max:255',
            'site_description' => 'nullable|max:255',
            'about-us' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        try {
            $settingsToUpdate = [];

            foreach ($validatedData as $key => $value) {
                $setting = \App\Models\Setting::where('key', $key)->first();

                if ($setting) {
                    if ($request->hasFile($key)) {
                        $file = $request->file($key);
                        $fileName = $key . '.' . $file->getClientOriginalExtension();
                        Storage::disk('public')->put('images/' . $fileName, file_get_contents($file));
                        if (Storage::exists($setting->value)) {
                            Storage::delete($setting->value);
                        }

                        $settingsToUpdate[$key] = 'storage/images/' . $fileName;
                    } else {
                        $settingsToUpdate[$key] = $value;
                    }
                }
            }

            foreach ($settingsToUpdate as $key => $value) {
                \App\Models\Setting::where('key', $key)->update(['value' => $value]);
            }
            Cache::forget('settings_data');
            notify()->success('Settings updated successfully!');
            return redirect()->back();
        } catch (\Throwable $th) {
            notify()->error($th->getMessage());
            return redirect()->back();
        }
    }
}
