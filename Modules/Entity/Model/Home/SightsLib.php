<?php
namespace Modules\Entity\Model\Home;

use Modules\Entity\ModelParent;

class SightsLib extends ModelParent {
    protected $table = 'home_sigts';
    protected $fillable = ['sight_id','home_id'];
    
   
}
