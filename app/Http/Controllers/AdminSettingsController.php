<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageSiteSettingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::firstOrFail();
        return view('admin.settings.settings', [
            'settings' => $settings
        ]);
    }

    public function update(ManageSiteSettingsRequest $request)
    {
        $settings = Setting::firstOrFail();


        $settings->site_name = $request->site_name;
        $settings->site_description = $request->site_description;
        $settings->site_facebook = $request->site_facebook;
        $settings->site_instagram = $request->site_instagram;
        $settings->site_twitter = $request->site_twitter;
        $settings->site_linkedin = $request->site_linkedin;
        $settings->site_behance = $request->site_behance;
        $settings->site_dribbble = $request->site_dribbble;
        $settings->site_email = $request->site_email;
        $settings->site_field_one = $request->site_field_one;
        $settings->site_field_one_value = $request->site_field_one_value;
        $settings->site_field_two = $request->site_field_two;
        $settings->site_field_two_value = $request->site_field_two_value;
        $settings->site_field_three = $request->site_field_three;
        $settings->site_field_three_value = $request->site_field_three_value;
        $settings->site_field_four = $request->site_field_four;
        $settings->site_field_four_value = $request->site_field_four_value;
        $settings->site_copyright = $request->site_copyright;
        $settings->site_creator_name = $request->site_creator_name;
        $settings->site_creator_link = $request->site_creator_link;

        $settings->save();

        $request->session()->flash('site_settings_updated', 'Site settings has been updated');
        return redirect()->back();
    }
}
