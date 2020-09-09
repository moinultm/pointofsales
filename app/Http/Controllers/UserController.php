<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $searchParams = ['name', 'email'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $users = User::orderBy('first_name', 'asc');
        return view('users.index')->withUsers($users->paginate(20));
    }




}
