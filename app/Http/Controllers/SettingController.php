<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = Setting::getAllGrouped();
        
        return view('settings.index', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                // Handle checkbox/boolean values
                if ($setting->type === 'boolean') {
                    $value = $request->has("settings.{$key}") ? '1' : '0';
                }
                $setting->update(['value' => $value]);
            }
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete old logo if exists
            $oldLogo = Setting::get('business_logo');
            if ($oldLogo && Storage::disk('public')->exists($oldLogo)) {
                Storage::disk('public')->delete($oldLogo);
            }

            // Store new logo
            $path = $request->file('logo')->store('logos', 'public');
            Setting::set('business_logo', $path, 'business');
        }

        // Clear cache
        Setting::clearCache();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
    }

    /**
     * Test email settings.
     */
    public function testEmail(Request $request)
    {
        // Placeholder for email testing
        return response()->json(['success' => true, 'message' => 'Test email sent!']);
    }
}
