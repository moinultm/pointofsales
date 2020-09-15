<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function hasRole($role) {
        $roles = $this->roles()->pluck('name')->toArray();
        return in_array($role, $roles);
    }


    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function can($permission, $arguments = []) {
        foreach($this->roles as $role) {
            if($role->can($permission)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Get full name attribute
     * */

    public function getNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = self::normalizeEmail($value);
    }

    public function setPasswordAttribute($password) {
        if(!is_null($password))
            $this->attributes['password'] = bcrypt($password);
    }

    public static function normalizeEmail($value) {
        return trim(strtolower($value));
    }


    public function getPermissionsAttribute () {
        $permissions = [];
        foreach ($this->roles as $role) {
            $rolePermissions = [];
            foreach ($role->permissions as $permission) {
                $rolePermissions[] = $permission->type.'.'.$permission->name;
            }
            $permissions = array_merge($permissions, $rolePermissions);
        }
        return $permissions;
    }
}
