<?php
namespace Modules\Entity\Model\Home;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Home extends ModelParent {
    protected $table = 'home';
	protected $fillable = [ 'name','description','user_id','date','color'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
	 function sights(){
        return $this->belongsToMany('Modules\Entity\Model\Sights\Sights','Modules\Entity\Model\Home\SightsLib','home_id','sight_id');
    }
	
	 function calendars(){
        return $this->belongsToMany('Modules\Entity\Model\Calendar\Calendar','Modules\Entity\Model\Home\SightsLib','home_id','calendar_id');
    }
	
	 function sliders(){
        return $this->hasMany('Modules\Entity\Model\Slider\Slider', 'page_id');
    }
	
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Home\TransHome', 'el_id');
    }
	

	
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }


   function checkUpdateBelongMany($request,$o,$name){
   $model_sights= $this->{$o}->pluck('id')->toArray();
   $request_sights= $request->{$name};
   $request_diff= array_keys(array_diff($request_sights,$model_sights));
   $model_diff=  array_keys(array_diff($model_sights,$request_sights));
   if(isset($model_diff[0]) || isset($request_diff[0])){return true;}
 }


  
    


  
}
