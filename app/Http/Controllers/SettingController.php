<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.setting.setting')->with('setting', Setting::first());
    }

    public function update()
    {
        $setting = Setting::first();
        dd($setting);
    }
}
