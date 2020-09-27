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

        return view('email.index');

    }
}
