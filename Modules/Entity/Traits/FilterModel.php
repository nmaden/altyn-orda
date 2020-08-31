<?php
namespace Modules\Entity\Traits;

use Illuminate\Http\Request;

trait FilterModel  {
    protected $filter_class = false;

    public function scopeFilter($query, Request $request){
	
        if (! $this->filter_class)
            return $query;

        $filter_class = $this->filter_class;
        $filter = new $filter_class($query, $request);
        $filter->filter();
      
        return $filter->getQuery();
    }

}
