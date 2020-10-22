<?php
namespace Modules\Entity\Model\Gid;

use Modules\Entity\Services\ModelFilter;
use Auth;
use Illuminate\Support\Facades\Request;

class Filter extends ModelFilter {
    public function filter(){
		
	
        $request  = $this->request;
       if($this->request->has('q') && $this->request->q){
           $this->query->where('imya', 'like', '%'.$this->request->q.'%');
		}
        elseif ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);
        elseif($request->s){
			 $this->search($request,'imya');
		}
		
        elseif ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');

        elseif ($this->request->has('country_id') && $this->request->country_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('country_id', $request->country_id);
            });

    
        elseif ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $request->city_id);
        
        elseif ($this->request->has('category_id') && $this->request->category_id)
            $this->query->where('spec_id', $request->category_id);
        
        elseif ($this->request->has('lang_id') && $this->request->lang_id)
            $this->query->whereHas('langs', function($q) use ($request){
                $q->where('lang_id', $request->lang_id);
              
            });
          
        
        else {
		$url_get = Request::url();
        $admin = strpos($url_get, "admin");
		if($admin){
			$this->query->where(['general'=>NULL])->Orwhere('general','=',0);
        }else{
			$this->query->where(['general'=>NULL,'publish'=>2])->Orwhere('general','=',0);

		}


            //$this->query->latest();
		}

    }

}
