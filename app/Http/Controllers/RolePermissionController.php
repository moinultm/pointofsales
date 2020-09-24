<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $roles = Role::all();
        return view('acl.role.index', compact('roles'));
    }



}
