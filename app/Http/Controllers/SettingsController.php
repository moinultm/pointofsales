<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function getIndex()
    {

        $setting = Settings::whereId(1)->first();
        if(!$setting){
            $setting = new Settings;
        }
        return view('settings.index')
            ->with('setting',$setting);

    }

}
