<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversityFees extends ModelParent {
    protected $table = 'university_fees';
    protected $fillable = [ 'degree_id', 'university_id', 'for_citizen_min', 'for_citizen_max', 'for_inter_min', 'for_inter_max'];
    
    function relDegree(){
        return $this->belongsTo('Modules\Entity\Model\LibDegree\LibDegree', 'degree_id');
    }
   
}
