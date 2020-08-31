<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityCat extends ModelParent {
    protected $table = 'university_cat';
    protected $fillable = [ 'university_id', 'cat_id'];
    
   
}
