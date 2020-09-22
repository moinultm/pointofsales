<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Warehouse;
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
        $users = User::orderBy('first_name', 'asc')->whereId(auth()->user()->id);
        return view('users.index')->withUsers($users->paginate(20));
    }



    public function getEditUser(User $user){
        $roles = Role::where('name', '!=', 'Super User')->get();
        $warehouses = Warehouse::all();

        return view('users.form', compact('roles', 'user', 'warehouses'));
    }



    public function viewProfile()
    {
        $user = \Auth::user();
        return view('users.profile')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postProfile(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = User::find($user_id);

        $user->first_name = empty($request->get('first_name')) ? $user->first_name : $request->get('first_name');
        $user->last_name = empty($request->get('last_name')) ? $user->last_name : $request->get('last_name');
        $user->email = empty($request->get('name')) ? $user->email  : $request->get('email');
        /*$user->password = $request->get('password');*/
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');

        $user->save();

        $message = trans('core.changes_saved');
        return redirect()->route('user.profile')->withMessage($message);

    }




}
