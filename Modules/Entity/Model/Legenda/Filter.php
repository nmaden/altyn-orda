<?php
namespace Modules\Entity\Model\Legenda;

use Modules\Entity\Services\ModelFilter;
use Illuminate\Support\Facades\Request;

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
