<?php
namespace Modules\Entity\Model\Gid;

use Modules\Entity\ModelParent;

class GidLang extends ModelParent {
    protected $table = 'gid_lang';
    protected $fillable = [ 'gid_id', 'lang_id'];
    
   
}
