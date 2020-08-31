<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityDiscipline extends ModelParent {
    protected $table = 'university_discipline';
    protected $fillable = [ 'university_id', 'discipline_id'];
    
   
}
