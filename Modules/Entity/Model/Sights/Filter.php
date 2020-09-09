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

       
        

			



/*
        if ($this->request->has('duration') && is_array($this->request->duration))
            $this->query->where(function($q) use ($request){
                foreach ($request->duration as $duration ){
                    if ($duration == 4)
                        $q->orWhere('duration_year', '>=', $duration);
                    else 
                        $q->orWhere('duration_year', $duration);
                }
            });
            
*/


        

/*
        if ($this->request->has('is_career') && $this->request->is_career)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_career', 1);
            });
*/


        

/*
        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_desc')
            $this->query->orderBy('updated_at', 'asc');
		*/
		/*
        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_qs_desc'){
			
            $this->query->with('relUniversity')
                    ->join('university', 'programs.univer_id', '=', 'university.id')
                    ->orderBy('university.rank_word', 'desc');
        }
		*/
        else {
			
            $this->query->latest();
		}

    }

}
