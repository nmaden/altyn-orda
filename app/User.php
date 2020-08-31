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
        'login', 'email', 'password','type_id'
    ];

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
	
	
	
	
	
	

	
	//  'string'  array('View_Admin','ADD_ARTICLES')
	//
	public function canDo($permission, $require = FALSE) {
		if(is_array($permission)) {
			foreach($permission as $permName) {
				
				$permName = $this->canDo($permName);
				if($permName && !$require) {
					return TRUE;
				}
				else if(!$permName  && $require) {
					return FALSE;
				}				
			}
			
			return  $require;
		}
		else {
			foreach($this->roles as $role) {
				foreach($role->perms as $perm) {
					//foo*    foobar
					if(str_is($permission,$perm->name)) {
						return TRUE;
					}
				}
			}
		}
	}
	
	// string  ['role1', 'role2']
	public function hasRole($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && !$require) {
                    return true;
                } elseif (!$hasRole && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }
	
	
	
	
	
	
	
	/*связи*/	
	
	public function articles() {
		return $this->hasMany('App\Article','user_id');
	}
	
	
	public function roles() {
		return $this->belongsToMany('App\Role','role_user','user_id','role_id');
	}
	public function rooms(){
		return $this->belongsToMany('App\Room','room_user','user_id','rom_id'); 
		
	}
	
	
	
	
	
	
	
	
	
	
}
