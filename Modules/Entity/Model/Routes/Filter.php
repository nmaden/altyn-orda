<?php
namespace Modules\Entity\Model\Routes;

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
		 
      	if($request->s){
			 $this->search($request);
		}
		
	
		elseif ($this->request->routes && $this->request->routes !='0'){			
            $this->query->where('id', $request->routes);
		}
	

	   elseif ($this->request->has('city_id') && $this->request->city_id)
			$this->query->where('city_id', $request->city_id);

	
	   else {
		$this->query->where('general','=',NULL);
       }
	
		
		
		
		
		

}

}
