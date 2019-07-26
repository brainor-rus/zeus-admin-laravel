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

    public function hasRole($slug){
        return $this->roles()->where('slug', $slug)->exists() ? true : false;
    }

    public function hasRoleWithPermission($slug){
        return $this->roles()->whereHas('permissions', function ($permission) use ($slug) {
            return $permission->whereSlug($slug);
        })->exists() ? true : false;
    }

    public function isSuperAdmin() {
        return $this->hasRole('super_admin');
    }
}
