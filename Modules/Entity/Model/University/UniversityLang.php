<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityLang extends ModelParent {
    protected $table = 'university_lang';
    protected $fillable = [ 'university_id', 'lang_id'];
    
   
}
