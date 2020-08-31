<?php
namespace Modules\Entity\Model\StudentData;

use Modules\Entity\Services\ModelFilter;

class Filter extends ModelFilter {
    public function filter(){
        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('f_name')) 
            $this->query->where('f_name', 'like', '%'.$this->request->f_name.'%');
        
    }

}
