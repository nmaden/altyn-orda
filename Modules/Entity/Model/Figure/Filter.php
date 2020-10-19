<?php
namespace Modules\Entity\Model\Figure;

use Modules\Entity\Services\ModelFilter;

class Filter extends ModelFilter {
    public function filter(){
		
        $request  = $this->request;

        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        elseif ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');
        elseif($request->s){
		
			 $this->search($request,'namefigure');
		}
		

        else {
			$this->query->where('general','=',NULL);

           
		}

    }

}
