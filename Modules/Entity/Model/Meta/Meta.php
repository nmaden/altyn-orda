<?php
namespace Modules\Entity\Model\Meta;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Meta extends ModelParent {
    protected $table = 'general';
	
	
    protected $fillable = [ 'seo_description','seo_title','items_id'];
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	 function langGid(){
        return $this->belongsToMany(
		'Modules\Entity\Model\LibLanguage\LibLanguage',
		'Modules\Entity\Model\Gid\GidLang', 'gid_id','lang_id');
    }
   function checkUpdateBelongMany($request,$o,$name){
   $model_sights= $this->{$o}->pluck('id')->toArray();
   $request_sights= $request->{$name};
   $request_diff= array_keys(array_diff($request_sights,$model_sights));
   $model_diff=  array_keys(array_diff($model_sights,$request_sights));
   if(isset($model_diff[0]) || isset($request_diff[0])){return true;}
 }

 function sights(){
        return $this->belongsToMany('Modules\Entity\Model\Sights\Sights','Modules\Entity\Model\Gid\SightsLib','gid_id','sight_id');
    }
    function langs() {
        return $this->hasMany('Modules\Entity\Model\Gid\GidLang','gid_id','id');
    }
	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	 function relCalendars(){
        return $this->hasMany('Modules\Entity\Model\Calendar\Calendar', 'general_id');
    }
	
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gid\TransGid', 'el_id');
    }
	

	
	   function getTransTableNameAttribute(){
        return $this->getTable();
    }
	  function getElIdAttribute(){
        return $this->id;
    }
/*
 function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Gallery\TransGallery', 'el_id');
    }
*/
}
