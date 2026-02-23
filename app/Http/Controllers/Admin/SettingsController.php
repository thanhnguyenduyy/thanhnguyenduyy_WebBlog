<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteSetting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'))
            ->with('title', 'Settings')
            ->with('currentViewId', 'settings');
    }

    public function update(Request $request)
    {
        $rules = [
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string',
            'contact_email' => 'required|email|max:255',
            'display_name' => 'required|string|max:255',
            'primary_slogan' => 'required|string',
            'short_bio' => 'required|string',
            'about_quote' => 'required|string',
            'technologist_bio' => 'required|string',
            'observer_bio' => 'required|string',
            'social_github' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_facebook' => 'nullable|url',
            'footer_quote' => 'required|string',
            // File fields validation
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'site_avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
            'site_favicon' => 'nullable|mimes:ico,png,jpg,jpeg|max:512',
        ];

        $request->validate($rules);

        // Handle regular text settings
        $settings = $request->except(['_token', 'site_logo', 'site_avatar', 'site_favicon']);
        foreach ($settings as $key => $value) {
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }

        // Handle file uploads
        $fileFields = ['site_logo', 'site_avatar', 'site_favicon'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/settings', $filename, 'public');
                
                SiteSetting::where('key', $field)->update([
                    'value' => '/storage/' . $path
                ]);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }
}
