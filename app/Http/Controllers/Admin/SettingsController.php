<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SiteSetting;
use App\Traits\FileCleanupTrait;
use App\Services\ImageService;

class SettingsController extends Controller
{
    use FileCleanupTrait;

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
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
            'tech_stack' => 'required|string',
            // File fields validation
            'site_avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ];

        $request->validate($rules);

        // Handle regular text settings
        $settings = $request->except(['_token', 'site_avatar']);
        foreach ($settings as $key => $value) {
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }

        // Handle file uploads
        $fileFields = ['site_avatar'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file
                $oldSetting = SiteSetting::where('key', $field)->first();
                if ($oldSetting) {
                    $this->deleteOldFile($oldSetting->value);
                }

                $file = $request->file($field);
                
                // Optimize and store using ImageService
                $path = $this->imageService->optimizeAndStore(
                    $file, 
                    'uploads/settings', 
                    400, // Width for avatar
                    400  // Height for avatar
                );
                
                SiteSetting::where('key', $field)->update([
                    'value' => $path
                ]);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }
}
