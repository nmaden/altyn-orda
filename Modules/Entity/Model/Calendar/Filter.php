<?php
namespace Modules\Entity\Model\Calendar;

use Modules\Entity\Services\ModelFilter;
use Carbon\Carbon;
class Filter extends ModelFilter {
    public function filter(){
		
        $request  = $this->request;

        if ($this->request->has('id') && $this->request->id) 
            $this->query->where('id', $this->request->id);

        if ($this->request->has('name') && $this->request->name) 
            $this->query->where('name', 'like', '%'.$this->request->name.'%');

        if($this->request->q){
           $this->query->where('name', 'like', '%'.$this->request->q.'%');
		}
	   
	   
        if ($this->request->has('sort_date') && $this->request->sort_date)
            if ($this->request->sort_date==0)
                $this->query;
            if ($this->request->sort_date==1)
              
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addWeek(1));
				
            if ($this->request->sort_date==2)  
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addMonth(1));
            if ($this->request->sort_date==3)
                $this->query->where('date', '>=',Carbon::now())->where('date', '<=',Carbon::now()->addYear(1));
            
        if ($this->request->has('city_id') && $this->request->city_id)
            $this->query->where('city_id', $request->city_id);
        
        if ($this->request->has('category_id') && $this->request->category_id)
            $this->query->where('category_id', $request->category_id);
        
		

		
					
			
       



        if ($this->request->has('duration') && is_array($this->request->duration))
            $this->query->where(function($q) use ($request){
                foreach ($request->duration as $duration ){
                    if ($duration == 4)
                        $q->orWhere('duration_year', '>=', $duration);
                    else 
                        $q->orWhere('duration_year', $duration);
                }
            });
            
        if ($this->request->has('is_campus') && $this->request->is_campus)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_campus', 1);
            });

        if ($this->request->has('is_med_insurance') && $this->request->is_med_insurance)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_med_insurance', 1);
            });

        if ($this->request->has('is_library') && $this->request->is_library)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_library', 1);
            });

        if ($this->request->has('is_inter_programm') && $this->request->is_inter_programm)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_inter_programm', 1);
            });

        if ($this->request->has('is_career') && $this->request->is_career)
            $this->query->whereHas('relData', function($q) use ($request){
                $q->where('is_career', 1);
            });

        if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_asc')
            $this->query->orderBy('name', 'desc');

        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_name_desc')
            $this->query->orderBy('name', 'asc');

        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_asc')
            $this->query->orderBy('updated_at', 'desc');

        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_updated_desc')
            $this->query->orderBy('updated_at', 'asc');
        else if ($this->request->has('sort_as') && $this->request->sort_as=='by_qs_desc'){
            $this->query->with('relUniversity')
                    ->join('university', 'programs.univer_id', '=', 'university.id')
                    ->orderBy('university.rank_word', 'desc');
        }
        else {
			
            $this->query->latest();
		}

    }

}
