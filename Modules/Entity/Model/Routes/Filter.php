<?php
namespace Modules\Entity\Model\Routes;

use Modules\Entity\Services\ModelFilter;

class Filter extends ModelFilter {
    public function filter(){
		
		$request  = $this->request;
		 
      		 		// dd($request->all());
/*
		if ($this->request->regions && $this->request->regions !='0'){			
            $this->query->where('city_id', $request->regions);
		}
	*/	 
		 if ($this->request->routes && $this->request->routes !='0'){ 
		 
            $this->query->where('id', $request->routes);
		}
		 else {
			//dd(15);
            $this->query->latest();
		}
		
		
		
		
		
		

}

}
