<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        Gate::authorize('settings.update');

        //$setting = Setting::first();
        $settings = Setting::checkSettings();
        return view('dashboard.setting.edit',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        Gate::authorize('settings.update');

        $data = [
            'image_first_left'=> 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_first_right'=> 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_second_left'=> 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_second_right'=> 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_third'=> 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'logo_w' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'logo_b' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'telegram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'phone' => 'nullable|string',
            'downprice_first_left' =>'nullable|string',
            'downprice_first_right'=>'nullable|string',
            'downprice_third' => 'nullable|string'
        ];
        foreach (config('app.languages') as $key => $value) {
            $data[$key . '*.title_first_right'] = 'nullable|string';
            $data[$key . '*.title_first_right2'] = 'nullable|string';
            $data[$key . '*.title_second_left'] = 'nullable|string';
            $data[$key . '*.title_second_right'] = 'nullable|string';
            $data[$key . '*.title_third'] = 'nullable|string';
            $data[$key . '*.uptitle_first_left'] = 'nullable|string';
            $data[$key . '*.uptitle_first_right'] = 'nullable|string';
            $data[$key . '*.downtitle_first_left'] = 'nullable|string';
            $data[$key . '*.downtitle_first_right2'] = 'nullable|string';
            $data[$key . '*.downtitle_second_left'] = 'nullable|string';
            $data[$key . '*.downtitle_second_right'] = 'nullable|string';
            $data[$key . '*.downtitle_third'] = 'nullable|string';
        }
        $validatedData = $request->validate($data);
        $old_image_first_left = $setting->image_first_left;
        $old_image_first_right = $setting->image_first_right;
        $old_image_second_left = $setting->image_second_left;
        $old_image_second_right = $setting->image_second_right;
        $old_image_third = $setting->image_third;
        $old_logo_w = $setting->logo_w;
        $old_logo_b = $setting->logo_b;
        $old_favicon = $setting->favicon;

        $data = $request->except([
        '_token',
        '_method',
        'logo_w',
        'logo_b',
        'favicon',
        'image_first_left',
        'image_first_right',
        'image_second_left',
        'image_second_right',
        'image_third'
        ]);
        $new_logo_w = $this->uploadImgae($request,'logo_w');
        if ($new_logo_w) {
            $data['logo_w'] = $new_logo_w;
        }
        //dd($data);
        $new_logo_b = $this->uploadImgae($request,'logo_b');
        if ($new_logo_b) {
            $data['logo_b'] = $new_logo_b;
        }
        // if ($request->file('logo')) {
        //     $file = $request->file('logo');
        //     $path = $file->store('uploads', [
        //         'disk' => 'public'
        //     ]);
        //     $new_logo = $path;
        // }
        // if ($new_logo) {
        //     $data['logo'] = $new_logo;
        // }
        $new_image_first_left = $this->uploadImgae($request,'image_first_left');
        if ($new_image_first_left) {
            $data['image_first_left'] = $new_image_first_left;
        }


        $new_image_first_right = $this->uploadImgae($request,'image_first_right');
        if ($new_image_first_right) {
            $data['image_first_right'] = $new_image_first_right;
        }

        $new_image_second_right = $this->uploadImgae($request,'image_second_right');
        if ($new_image_second_right) {
            $data['image_second_right'] = $new_image_second_right;
        }

        $new_image_second_left = $this->uploadImgae($request,'image_second_left');
        if ($new_image_second_left) {
            $data['image_second_left'] = $new_image_second_left;
        }

        $new_image_third = $this->uploadImgae($request,'image_third');
        if ($new_image_third) {
            $data['image_third'] = $new_image_third;
        }

        $new_favicon = $this->uploadImgae($request,'favicon');
        if ($new_favicon) {
            $data['favicon'] = $new_favicon;
        }

        $setting->update($data);

        if ($old_image_first_left && $new_image_first_left) {
            Storage::disk('public')->delete($old_image_first_left);
        }

        if ($old_image_first_right && $new_image_first_right) {
            Storage::disk('public')->delete($old_image_first_right);
        }

        if ($old_image_second_left && $new_image_second_left) {
            Storage::disk('public')->delete($old_image_second_left);
        }

        if ($old_image_second_right && $new_image_second_right) {
            Storage::disk('public')->delete($old_image_second_right);
        }

        if ($old_image_third && $new_image_third) {
            Storage::disk('public')->delete($old_image_third);
        }

        if ($old_favicon && $new_favicon) {
            Storage::disk('public')->delete($old_favicon);
        }

        if ($old_logo_w && $new_logo_w) {
            Storage::disk('public')->delete($old_logo_w);
        }
        if ($old_logo_b && $new_logo_b) {
            Storage::disk('public')->delete($old_logo_b);
        }
        return redirect()->route('dashboard.setting.edit')
            ->with('success', 'تم تحديث اعدادات الموقع');
    }

    protected function uploadImgae(Request $request,$name)
    {
        if (!$request->hasFile($name)) {
            return;
        }

        $file = $request->file($name); // UploadedFile Object

        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;
    }
}
