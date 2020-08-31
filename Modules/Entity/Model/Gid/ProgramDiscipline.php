<?php
namespace Modules\Entity\Model\Program;

use Modules\Entity\ModelParent;

class ProgramDiscipline extends ModelParent {
    protected $table = 'program_discipline';
    protected $fillable = [ 'program_id', 'discipline_id','univer_id'];
    
   
}
