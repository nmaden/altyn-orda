<?php
namespace Modules\Entity\Model\Sights;

use Modules\Entity\ModelParent;
use Modules\Entity\Traits\CheckTrans;

class Sights extends ModelParent {
    protected $table = 'sights';
	
	
    protected $fillable = ['photo','coord','name','description','user_id','city_id','props_1','props_2','props_3','props_4','props_5','price','video','coord_name','subtitle','introtext','date','longitude','latitude'];
	
    protected $filter_class = Filter::class; 
    use Presenter,CheckTrans;
    
    function relCity(){
        return $this->belongsTo('Modules\Entity\Model\LibCity\LibCity', 'city_id');
    }
	
	 function relInforms(){
        return $this->HasOne('Modules\Entity\Model\Informs\Informs', 'gid_id');
    }
	
	function relApplication(){
        return $this->hasOne('Modules\Entity\Model\Calendar\Application\Application', 'gallery_id','id');
    }
	
  function relTrans(){
        return $this->hasOne('Modules\Entity\Model\Sights\TransSights', 'el_id');
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
