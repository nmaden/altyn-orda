<?php
namespace Modules\Entity\Model\Meta;

use Modules\Entity\Services\ModelFilter;
use Auth;
class Filter extends ModelFilter {
    public function filter(){
		
		if (!Auth::guest()) {
			
		$user_type = Auth::user()->type_id;
		if($user_type == 2){
		  $user = Auth::user()->id;
            $this->query->where('user_id', $user);
		}
	}
        $request  = $this->request;
       if($this->request->has('q') && $this->request->q){
           $this->query->where('imya', 'like', '%'.$this->request->q.'%');
		}
        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');

        if ($this->request->has('country_id') && $this->request->country_id)
            $this->query->whereHas('relUniversity', function($q) use ($request){
                $q->where('country_id', $request->country_id);
            });

    
        if ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $request->city_id);
        
        if ($this->request->has('category_id') && $this->request->category_id)
            $this->query->where('spec_id', $request->category_id);
        
        if ($this->request->has('lang_id') && $this->request->lang_id)
            $this->query->whereHas('langs', function($q) use ($request){
                $q->where('lang_id', $request->lang_id);
              
            });
          
        
        else {
			
            $this->query->latest();
		}

    }

}
