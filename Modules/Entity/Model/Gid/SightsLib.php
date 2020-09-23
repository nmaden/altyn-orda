<?php
namespace Modules\Entity\Model\Gid;

use Modules\Entity\ModelParent;

class SightsLib extends ModelParent {
    protected $table = 'gidSights';
    protected $fillable = ['sight_id','gid_id'];
    
   
}
