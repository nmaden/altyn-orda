<?php
namespace Modules\Entity\Model\Coords;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Coords extends ModelParent {
    protected $table = 'lib_coord';
	protected $fillable = [ 'coord_a','coord_b','coord_c','coord_d','routes_id','user_id'];
	
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
	 function sights(){
        return $this->belongsToMany('Modules\Entity\Model\Sights\Sights','Modules\Entity\Model\Home\SightsLib','home_id','sight_id');
    }
	
	
	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Calendar\Application\Application', 'gallery_id','id');
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
