<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use App\Role;
use App\RoleAccess;

use Auth;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // return the nick name (first name)
    public function nickName()
    {
        $name     = Auth::user()->name;
        $arrayName = explode(' ', $name);
        if ($arrayName[0]) {
            return $arrayName[0];
        }
        return $name;
    }

    // return the nick name (first name)
    public static function getUsername()
    {
        $userId     = Auth::user()->id;
        $user       = Self::findOrFail($userId);

        return $user->username;
    }

    // return photo profile
    public function photoProfile()
    {
        $photo     = Auth::user()->photo;
        if ($photo) {
            return $photo;
        }
        return '/assets/img/avatar/avatar-1.png';
    }

    public static function Role($idFeature)
    {
        if (Auth::check()) {
            $roleId  = Auth::user()->role_id;
            $feature = RoleAccess::where('role_id', $roleId)
                        -> where('feature_id', $idFeature)
                        -> select('id')
                        -> first();
            if (!$feature) {
                return false;
            }
            return true;
        } else {
            return redirect('login')->with('warning', 'Please login to access this page');
        }
    }

}
