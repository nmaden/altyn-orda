<?php

namespace Modules\Entity\Policies;

use App\User;
use Modules\Entity\Model\SysUserType\SysUserType;
use Illuminate\Auth\Access\HandlesAuthorization;
use RoleService;

class ContentPolicy {
    use HandlesAuthorization;


    private function mainCheck($user){
		return RoleService::getRole($user->type_id);
    }
   

    public function list(User $user){
		
        if (!$this->mainCheck($user)){
            return false;
		}
        return true;
    }

    public function view($user, $item){
        if (!$this->mainCheck($user))
            return false;

        return true;
    }

    public function create($user){
		
		
      if (!$this->mainCheck($user))
		  if ($this->mainCheck($user) == 'GID'){
            return false;
		  }
		  
            return false;

        return true;
    }

    public function update($user, $item){
		  if ($this->mainCheck($user) == 'GID'){
            return false;
		  }
		  
       if (!$this->mainCheck($user)){return false;}
		
			     return true;

		}
    

    public function delete($user){
       if (!in_array($user->type_id, [SysUserType::ADMIN]))
            return false;

        return true;
    }

}
