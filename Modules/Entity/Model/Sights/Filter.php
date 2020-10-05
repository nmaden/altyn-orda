<?php
namespace Modules\Entity\Model\Sights;

use Modules\Entity\Services\ModelFilter;

class Filter extends ModelFilter {
    public function filter(){
		
        $request  = $this->request;
		 
		 		 
      
		if ($this->request->regions && $this->request->regions !='0'){ 
            $this->query->where('city_id', $request->regions);
		}
		 
		 if ($this->request->sights && $this->request->sights !='0'){ 
            $this->query->where('id', $request->sights);
		}
		 
		 
		 
		 
		 
        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');

        if ($this->request->has('country_id') && $this->request->country_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('country_id', $request->country_id);
            });

        else {
			$this->query->where('general','=',NULL);

           
		}

    }

}
