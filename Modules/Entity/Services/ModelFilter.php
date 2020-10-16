<?php
namespace Modules\Entity\Services;

use Illuminate\Http\Request;

class ModelFilter{
    protected $query = false;
    protected $request = false;

    public function __construct($query, Request $request){
        $this->query = $query;
        $this->request = $request;
    }
    function search($request){
		$lang = app()->getLocale();
			 if($lang != 'ru'){
				 
               $this->query->whereHas('relTrans', function($q) use ($request){
                    $q->where('name', 'like', '%'.$request->s.'%');;
                });
			 }else{
	         $this->query->where('name', 'like', '%'.$request->s.'%');
			 }
			 
	}
    function getQuery(){
        return $this->query;
    }
    
}
