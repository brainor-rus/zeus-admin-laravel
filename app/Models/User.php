<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $zeusAdminIgnore = [
        'notifications', 'readNotifications', 'unreadNotifications'
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function getPermissionsAttribute()
    {
        $user = User::with('roles')->where('id',$this->id)->first();
        $roles =  Role::with('permissions')->whereIn('id',$user->roles->pluck('id'))->get();
        $permissions = array();
        foreach($roles as $role){
            foreach($role->permissions as $permission) {
                $permissions[] = $permission->slug;
            }
        }

        return $permissions;
    }

    public function hasPermission($permission) {
        return in_array($permission, $this->permissions ?? []);
    }

    public function isSuperAdmin() {
        $roles = $this->roles()->pluck('slug');
        $roles = isset($roles) ? $roles->toArray() : [];

        return in_array("super_admin", $roles);
    }
}
