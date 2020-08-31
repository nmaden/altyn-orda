<?php
namespace Modules\Entity\Model\SysDisklaimer;

use Modules\Entity\ModelParent;

class SysDisklaimer extends ModelParent {
    protected $table = 'sys_disklaimer';
    protected $fillable = [ 'module', 'part', 'note'];
    

    
}
