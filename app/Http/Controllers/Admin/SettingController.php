<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function saveddata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'website_name' => 'required|max:255',
            'website_logo' => 'required',
            'website_favicon' => 'nullable',
            'description' => 'nullable',
            'meta_title' => 'required|max:255',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('message', "All fields are required !");
        }

        // add data if already then update
        $setting = Settings::where('id', '1')->first();

        if ($setting) {
            $setting->website_name = $request->website_name;

            if ($request->hasfile('website_logo')) {

                $destination = 'upload/settings/' . $setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getclientOriginalExtension();
                $file->move('upload/settings/', $filename);

                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {

                $destination = 'upload/settings/' . $setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getclientOriginalExtension();
                $file->move('upload/settings/', $filename);

                $setting->favicon = $filename;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message', "Setting Updated");
        } 
        else
        {
            $setting = new Settings;
            $setting->website_name = $request->website_name;

            if ($request->hasfile('website_logo')) {
                $file = $request->file('website_logo');
                $filename = time() . '.' . $file->getclientOriginalExtension();
                $file->move('upload/settings/', $filename);

                $setting->logo = $filename;
            }

            if ($request->hasfile('website_favicon')) {
                $file = $request->file('website_favicon');
                $filename = time() . '.' . $file->getclientOriginalExtension();
                $file->move('upload/settings/', $filename);

                $setting->favicon = $filename;
            }

            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;
            $setting->save();

            return redirect('admin/settings')->with('message', "Setting Added");
        }
    }
}
