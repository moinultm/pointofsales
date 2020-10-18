<?php

namespace App\Http\Controllers;

use App\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function getIndex(Request $request)
    {
        if (auth()->user()->can('news.manage')) {
            $users = User::orderBy('first_name', 'asc');
            if ($request->get('name')) {
                $users->where(function($q) use($request) {
                    $q->where('first_name', 'LIKE', '%' . $request->get('name') . '%');
                    $q->orWhere('last_name', 'LIKE', '%' . $request->get('name') . '%');
                });
            }
            if ($request->get('email')) {
                $users->where(function($q) use($request) {
                    $q->where('email', 'LIKE', '%' . $request->get('email') . '%');
                });
            }
        }
        else{
         $users = NewsPost::orderBy('first_name', 'asc')->whereId(auth()->user()->id);


        }
        return view('news.index')->withUsers($users->paginate(10));
    }

}
