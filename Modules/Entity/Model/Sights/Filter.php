<?php
namespace Modules\Entity\Model\Sights;

use Modules\Entity\Services\ModelFilter;
use Illuminate\Support\Facades\Request;

class Filter extends ModelFilter {
    public function filter(){
		
        $request  = $this->request;
		 
		 		 
      
		if ($this->request->regions && $this->request->regions !='0'){ 
            $this->query->where('city_id', $request->regions);
        }

        if ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $request->city_id);
    
		 
		 elseif ($this->request->sights && $this->request->sights !='0'){ 
            $this->query->where('id', $request->sights);
		}
		 
		 elseif($request->s){
			 $this->search($request);
		}
		
		 
		 
		 
        elseif ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        elseif ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');

        elseif ($this->request->has('country_id') && $this->request->country_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('country_id', $request->country_id);
            });

        else {
		$url_get = Request::url();
        $admin = strpos($url_get, "admin");
		if($admin){
			$this->query->where(['general'=>NULL])->Orwhere('general','=',0);
        }else{
			$this->query->where(['general'=>NULL,'publish'=>2])->Orwhere('general','=',0);

		}


         }

    }

}
