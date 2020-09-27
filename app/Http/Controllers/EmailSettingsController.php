<?php

namespace App\Http\Controllers;

use App\Email;
use App\EmailSettings;
use Illuminate\Http\Request;

class EmailSettingsController extends Controller
{
    public function getIndex()
    {

        $setting = EmailSettings::whereId(1)->first();

        if(!$setting){
            $setting = new EmailSettings;
        }

        return view('email.index')->with('setting',$setting);

    }


    public function postIndex(Request $request)
    {

        $this->validate($request, [
            'driver' => 'required',
            'from_address' => 'required|email',
            'host' => 'required',
            'from_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required'
        ]);

        $setting = EmailSettings::findOrFail(1);
        $setting->driver = $request->get('driver');
        $setting->host = $request->get('host');
        $setting->from_address = $request->get('from_address');
        $setting->from_name = $request->get('from_name');
        $setting->username = $request->get('username');
        $setting->password = $request->get('password');
        $setting->encryption = $request->get('encryption');

        $message = trans('core.changes_saved');
        $setting->save();

        return redirect()->back()->withSuccess($message);
    }
}
