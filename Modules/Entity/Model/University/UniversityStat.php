<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityStat extends ModelParent {
    protected $table = 'university_stat';
    protected $fillable = [ 'university_id', 'num_student_total', 'num_student_citizen', 'num_student_inter', 'num_teacher_total', 'num_teacher_citizen', 'num_teacher_inter'];
    
   
}
