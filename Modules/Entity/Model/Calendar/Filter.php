<?php
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Services\ModelFilter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class Filter extends ModelFilter {
    public function filter(){
		
        $request  = $this->request;

       if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        elseif ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');
			

        elseif($request->s && !isset($this->request->sort_date)){
			 $this->search($request);
		}
		
	    elseif($this->request->q){
           $this->query->where('name', 'like', '%'.$this->request->q.'%');
		}
	   
       
        elseif ($this->request->has('sort_date') && $this->request->sort_date){
			
            if ($this->request->sort_date==0)
                $this->query;
            if ($this->request->sort_date==1)
              
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addWeek(1));
				
            if ($this->request->sort_date==2)  
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addMonth(1));
            if ($this->request->sort_date==3)
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addYear(1));
	}
        elseif ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $request->city_id);
        
        elseif ($this->request->has('category_id') && $this->request->category_id)
            $this->query->where('category_id', $request->category_id);
        
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
