<?php
namespace Modules\Entity\Model\Manager;

use Modules\Entity\ModelParent;

class ManagerUniver extends ModelParent {
    protected $table = 'manager_univers';
    protected $fillable = [ 'manager_id', 'univer_id', 'edited_user_id'];
    
   
}
